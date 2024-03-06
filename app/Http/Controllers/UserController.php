<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Mail\SignUp;
use App\Models\Address;
use App\Models\Avatar;
use App\Models\Biography;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use function PHPUnit\Framework\isNan;
use Illuminate\Support\Facades\Auth;
use App\Models\Link;
class UserController extends StandardController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $userData = $request->only('first-name-input', 'last-name-input', 'username-input', 'password-input', 'email-input','phone-input','role-input');

        try {
            DB::beginTransaction();

            $address['id'] = null;
            if(!is_null($request->post('address-line-input'))){
                $address = Address::insertAddress($request->post('address-line-input'), $request->post('number-input'), $request->post('city-input'), $request->post('state-input'), $request->post('zip-code-input'), $request->post('country-input'));
            }

            $user = User::createUser($userData, $address['id']);

            if(!is_null($request->post('biography-input'))){
                Biography::createBiography($user['id'],$request->post('biography-input'));
            }

            if(!is_null($request->file('user-avatar'))){
                $imageName = time() . '.' . $request->file('user-avatar')->extension();
                Avatar::createAvatar($user['id'],$imageName);
                $request->file('user-avatar')->move(public_path('assets/images/avatars'), $imageName);
            }

            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();

            if(isset($imageName) && File::exists(public_path('/assets/img/products/' . $imageName))){
                File::delete(public_path('/assets/img/products/' . $imageName));
            }

            return redirect()->back()->with('error-msg', 'An error has occurred, please try again later.');
        }

        $link = $user['token'];
        Mail::to('pp5104133@gmail.com')->send(new SignUp($link));
        return back()->with('success-msg', "Your account has been created successfully. Please check your email for activation instructions. Thank you!");

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $this->data['user'] = $user;
        return view('pages.user.show', ['data' => $this->data]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $biography = "";
        if(isset($user->biography)) $biography = $user->biography['text'];
        $this->data['biography'] = $biography;

        $addressName = "";
        $addressNumber = "";
        $city = "";
        $state = "";
        $zipCode = "";
        $country = "";
        if(isset($user->address)){
            $addressName = $user->address['address_name'];
            $addressNumber = $user->address['address_number'];
            $city = $user->address['city'];
            $state = $user->address['state'];
            $zipCode = $user->address['zip_code'];
            $country = $user->address['country'];
        }

        $this->data['addressInformation'] = ['address_name' => $addressName, 'address_number' => $addressNumber, 'city' => $city, 'state' => $state, 'zip_code'=>$zipCode,'country'=>$country];
        $this->data['user'] = $user;
        return view('pages.user.edit', ['data' => $this->data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $userData = $request->only('first-name-input', 'last-name-input', 'username-input', 'email-input','phone-input',);

        try {
            DB::beginTransaction();

            $address['id'] = null;
            if(!is_null($request->post('address-line-input'))){
                $address = Address::firstOrCreateAddress($request->post('address-line-input'), $request->post('number-input'), $request->post('city-input'), $request->post('state-input'), $request->post('zip-code-input'), $request->post('country-input'));
            }

            $user = User::updateUser($userData, $address['id'], $user);

            if(!is_null($request->post('biography-input'))){
                Biography::updateBiography($user,$request->post('biography-input'));
            }

            if(!is_null($request->file('user-avatar'))){
                if(isset($user->avatar)){
                    $oldAvatarName = $user->avatar['src'];
                    $imageName = time() . '.' . $request->file('user-avatar')->extension();
                    Avatar::updateAvatar($user,$imageName);
                    $request->file('user-avatar')->move(public_path('assets/images/avatars'), $imageName);
                    File::delete(public_path('/assets/images/avatars/' . $oldAvatarName));
                }else{
                    $imageName = time() . '.' . $request->file('user-avatar')->extension();
                    Avatar::createAvatar($user['id'],$imageName);
                    $request->file('user-avatar')->move(public_path('assets/images/avatars'), $imageName);
                }
            }

            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();

            if(isset($imageName) && File::exists(public_path('/assets/images/avatars/' . $imageName))){
                File::delete(public_path('/assets/images/avatars/' . $imageName));
            }

            return redirect()->back()->with('error-msg', 'An error has occurred, please try again later.');
        }

        return back()->with('success-msg', "Your account has been updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('home');
    }

    public function activate(string $token){

        try {
            DB::beginTransaction();
            User::activate($token);
            DB::commit();
            return redirect()->route('login.index');
        }catch (\Exception $e){
            DB::rollBack();
        }

        return view('pages.user.create', ['data' => $this->data]);
    }

    public function writer(User $user){

        $this->data['writer'] = $user;

        $words = explode(' ',$user->biography['biography_text']);
        $shortBiography = array_slice($words,0,25);
        $shortBiography = implode(' ',$shortBiography);
        $shortBiography .= "... ";

        $this->data['shortBiography'] = $shortBiography;
        $this->data['writers'] = User::getAllWriters();

        $relatedCategoriesIDs = [];
        foreach ($user->books as $book){
            foreach ($book->categories as $category){
                if (!in_array($category['id'],$relatedCategoriesIDs))
                    $relatedCategoriesIDs[] = $category['id'];
            }
        }

        $this->data['relatedCategories'] = Category::getRelatedCategories($relatedCategoriesIDs);

        foreach ($this->data['relatedCategories'] as $key => $category)
            $category['src'] = $key + 1 . '.jpg';

        $this->data['books'] = $user->books;


        return view('pages.user.writer', ['data' => $this->data]);
    }
}

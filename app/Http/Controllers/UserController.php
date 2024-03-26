<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Mail\SignUp;
use App\Models\Address\Address;
use App\Models\Address\DTO\AddressDTO;
use App\Models\Address\Services\CreateAddressService;
use App\Models\Avatar\Avatar;
use App\Models\Biography\Biography;
use App\Models\Book\Book;
use App\Models\Category\Category;
use App\Models\User\DTO\CreateUserDTO;
use App\Models\User\Services\CreateUserService;
use App\Models\User\Services\GetActiveUsersService;
use App\Models\User\Services\GetBannedUsers;
use App\Models\User\Services\GetDeletedUsers;
use App\Models\User\Services\StoreUserService;
use App\Models\User\User;
use App\Models\Visit\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;

//use App\Repositories\UserRepository;
//use App\Repositories\UserRepositoryInterface;

class UserController extends StandardController
{

    /**
     * Display a listing of the resource.
     */
    public function index(GetActiveUsersService $activeUsers, GetBannedUsers $bannedUsers, GetDeletedUsers $deletedUsers)
    {
        $this->data['activeUsers'] = $activeUsers->execute();
        $this->data['deletedUsers'] = $bannedUsers->execute();
        $this->data['bannedUsers'] = $deletedUsers->execute();

        return view('pages.user.index',['data'=>$this->data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Visit::logPage('Sign up');
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request, StoreUserService $action)
    {
        try{
            DB::beginTransaction();
            $action->execute($request);
            DB::commit();
        }catch (Exception $e){
            DB::rollBack();

            if(isset($imageName) && File::exists(public_path('/assets/img/products/' . $imageName))){
                File::delete(public_path('/assets/img/products/' . $imageName));
            }

            return redirect()->back()->with('error-msg', 'An error has occurred, please try again later.');
        }

        return back()->with('success-msg', "Your account has been created successfully. Please check your email for activation instructions. Thank you!");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if(Auth::user()['role_id']!=1 && Auth::user()->getAuthIdentifier() != $user['id']){
            return redirect()->back();
        }

        Visit::logPage('Single User');
        $this->data['user'] = $user;
        return view('pages.user.show', ['data' => $this->data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(Auth::user()['role_id']!=1 && Auth::user()->getAuthIdentifier() != $id){
            return redirect()->back();
        }


        Visit::logPage('Edit User');
        $user = User::getUser($id);

        $biography = "";

        if(isset($user->biography)) $biography = $user->biography['biography_text'];
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
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::getUser($id);
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
    public function destroy(User $user,Request $request)
    {
        try {
            DB::beginTransaction();

            Book::deleteUsersBooks($user['id']);

            $user = User::deleteUser($user['id']);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
        }

        if($request->ajax()){
            return response()->json(['success' => true,'message' => 'User deleted successfully']);
        }

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
        Visit::logPage('Writer');
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

    public function activateUser($id){
        try {
            DB::beginTransaction();
            $user = User::activateUser($id);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();

            return response()->json(['success' => false, 'message' => $e->getMessage()], $e->getCode());
        }

        return response()->json(['success' => true,'message' => 'USer activated successfully','id' => $id]);
    }

    public function banUser($id){
        try {
            DB::beginTransaction();
            $user = User::banUser($id);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();

            return response()->json(['success' => false, 'message' => $e->getMessage()], $e->getCode());
        }

        return response()->json(['success' => true,'message' => 'USer banned successfully','id' => $id]);
    }

    public function unbanUser($id){
        try {
            DB::beginTransaction();
            $user = User::unbanUser($id);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();

            return response()->json(['success' => false, 'message' => $e->getMessage()], $e->getCode());
        }

        return response()->json(['success' => true,'message' => 'USer unbanned successfully','id' => $id]);
    }
}

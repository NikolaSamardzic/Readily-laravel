<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\SignUp;
use App\Models\Address;
use App\Models\Avatar;
use App\Models\Biography;
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
        $this->getLinks();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->getLinks();
        return view('pages.user.create', ['data' => $this->data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
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
        $this->getLinks();
        $this->data['user'] = $user;
        return view('pages.user.show', ['data' => $this->data]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->getLinks();
        $this->data['user'] = $user;
        return view('pages.user.edit', ['data' => $this->data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
}

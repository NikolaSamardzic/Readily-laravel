<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Book\Book;
use App\Models\Category\Category;
use App\Models\User\Services\ActivateUserService;
use App\Models\User\Services\DeleteUserService;
use App\Models\User\Services\GetUserDataService;
use App\Models\User\Services\GetUsersAdminPanelService;
use App\Models\User\Services\StoreUserService;
use App\Models\User\Services\UpdateUserLogicService;
use App\Models\User\User;
use App\Models\Visit\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Mockery\Exception;

class UserController extends StandardController
{

    /**
     * Display a listing of the resource.
     */
    public function index(GetUsersAdminPanelService $action)
    {
        $this->data['users'] = $action->execute();

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
    public function edit(User $user, GetUserDataService $action)
    {
        if(Auth::user()['role_id']!=1 && Auth::user()->getAuthIdentifier() != $user['id']){
            return redirect()->back();
        }

        Visit::logPage('Edit User');
        $this->data['information'] = $action->execute($user);

        return view('pages.user.edit', ['data' => $this->data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request,User $user, UpdateUserLogicService $action)
    {
        try {
            DB::beginTransaction();
            $action->execute($request, $user);
            DB::commit();
        }catch (Exception $e){
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
    public function destroy(User $user,Request $request, DeleteUserService $action)
    {
        try{
            DB::beginTransaction();
            $action->execute($user);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
        }

        if($request->ajax()){
            return response()->json(['success' => true,'message' => 'User deleted successfully']);
        }

        return redirect()->route('home');
    }

    public function activate(string $token, ActivateUserService $action){

        try {
            DB::beginTransaction();
            $action->execute($token);
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

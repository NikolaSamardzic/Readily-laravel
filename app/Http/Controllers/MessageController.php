<?php

namespace App\Http\Controllers;

use App\Mail\SendAdminMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MessageController extends StandardController
{
    public function index(){
        $messages = Message::all();

        return view('pages.admin.message.index',['messages'=>$messages]);
    }

    public function store(Request $request){


        try {
            DB::beginTransaction();
            Message::insertMessage($request->input('subject'),$request->input('text'),auth()->user()->getAuthIdentifier());

            $admins = User::select('email')->where('role_id','=',1)->get();
            $admins = iterator_to_array($admins);
            Mail::to($admins)->send(new SendAdminMessage($request->input('subject'),$request->input('text'),auth()->user()));

            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }

        return response()->json(['success' => true,'message' => 'Thank you! Your message has been sent successfully!']);
    }

    public function destroy($id){
        try {
            DB::beginTransaction();
            $message = Message::query()->find($id);
            $message->delete();
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], $e->getCode());
        }

        return response()->json(['success' => true,'message' => 'Message deleted successfully!']);
    }

}

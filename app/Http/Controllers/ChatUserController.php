<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatUser;
use App\Models\User;

class ChatUserController extends Controller
{
    public function chatuser(){
        $chatusers = ChatUser::all();
        return view('chatuser.view_chatuser',compact('chatusers'));
    }

    public function createChatUser(){
        $users = User::pluck('name','id')->unique();
        return view('chatuser.create_chatuser',compact('users'));
    }

    public function storeChatUser(Request $request){
        $request->validate([
            'user_id1' => 'required',
            'user_id2' => 'required'
        ]);

        $chatuser = ChatUser::create([
            'user_id1'  => $request->input('user_id1'),
            'user_id2'  => $request->input('user_id2'),
            'status'    => "unread",
        ]);

        session()->flash('success', 'Chat User added successfully!');
        return redirect()->route('chatuser');
    }

    public function ChatUserEdit($id){
        $chatusers = ChatUser::find($id);
        $users = User::pluck('name','id')->unique();
        return view('chatuser.create_chatuser',compact('chatusers','users'));
    }

    public function ChatUserUpdate(Request $request, $id) {
        $request->validate([
            'user_id1' => 'required',
            'user_id2' => 'required'
        ]);
        $chatusers = ChatUser::find($id);
        $chatusers->update([
            'user_id1'  => $request->input('user_id1'),
            'user_id2'  => $request->input('user_id2'),
            'status'    => $request->input('status'),
        ]);

        session()->flash('success', 'Chat User Updated successfully!');
        return redirect()->route('chatuser');
    }

    public function ChatUserDestroy($id){
        $chatusers = ChatUser::find($id);
        $chatusers->delete();
        session()->flash('danger', 'Chat User Delete successfully!');
        return redirect()->route('chatuser');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;

class ChatController extends Controller
{
   public function chat()
   {
      $chats = Chat::all();
      return view('chat.view_chat', compact('chats'));
   }

   public function createChat()
   {
      $users = User::pluck('name','id')->unique();
      return view('chat.create_chat',compact('users'));
   }

   public function storeChat(Request $request)
   {
      $request->validate([
         'sender_id'   => 'required',
         'receiver_id' => 'required',
         'chat'        => 'required',
      ]);

      $filename = '';
      if ($request->hasFile('attchment')) {
         $image = $request->file('attchment');
         $filename = time() . '.' . $image->getClientOriginalExtension();
         $image->move('attchments', $filename);
      }

      $chats = Chat::create([
         'sender_id'   => $request->input('sender_id'),
         'receiver_id' => $request->input('receiver_id'),
         'chat'        => $request->input('chat'),
         'attchment'   => $filename
      ]);

      session()->flash('success', 'Chat added successfully!');
      return redirect()->route('chat');
   }

   public function ChatEdit($id)
   {
      $chats = Chat::find($id);
      $users = User::pluck('name','id')->unique();
      return view('chat.create_chat', compact('chats','users'));
   }

   public function ChatUpdate(Request $request, $id)
   {
      $request->validate([
         'sender_id'   => 'required',
         'receiver_id' => 'required',
         'chat'        => 'required',
      ]);
      $chats = Chat::find($id);

      if ($request->hasFile('attchment')) {
         $image = $request->file('attchment');
         $filename = time() . '.' . $image->getClientOriginalExtension();
         $image->move('attchments', $filename);
         $chats->image = $filename;
      }
      $chats->update([
         'sender_id'   => $request->input('sender_id'),
         'receiver_id' => $request->input('receiver_id'),
         'chat'        => $request->input('chat')
      ]);

      session()->flash('success', 'Chat Updated successfully!');
      return redirect()->route('chat');
   }

   public function ChatDestroy($id)
   {
      $chats = Chat::find($id);
      $chats->delete();
      session()->flash('danger', 'Chat Delete successfully!');
      return redirect()->route('chat');
   }
}

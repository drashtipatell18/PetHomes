<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function users(){
    $users = User::all();
    return view('user.view_user',compact('users'));
   }

   public function userCreate(){
    return view('user.create_user');
   }

   public function userInsert(Request $request){
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'phone' => 'required',
    ]);

    $filename = '';
    if ($request->hasFile('image')){
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('images', $filename);
    }

    $user = User::create([
        'name'      => $request->input('name'),
        'email'     => $request->input('email'),
        'password'  => bcrypt($request->input('password')),
        'phone'     => $request->input('phone'),
        'address'     => $request->input('address'),
        'image'     => $filename
    ]);

    session()->flash('success', 'User added successfully!');
    return redirect()->route('user');
   }

   public function userEdit($id){
    $users = User::find($id);
    return view('user.create_user', compact('users'));
   }

   public function userUpdate(Request $request,$id){
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
    ]);
    $user = User::find($id);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('images', $filename);
        $user->image = $filename;
    }

    $user->update([
        'name'      => $request->input('name'),
        'email'     => $request->input('email'),
        'password'  => bcrypt($request->input('password')),
        'phone'     => $request->input('phone'),
        'address'   => $request->input('address')
    ]);

    session()->flash('success', 'User updated successfully!');
    return redirect()->route('user');
   }

   public function userDestroy($id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash('danger', 'User Delete successfully!');
        return redirect()->route('user');
    }
}

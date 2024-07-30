<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('user.view_user', compact('users'));
    }

    public function userCreate()
    {
        return view('user.create_user');
    }

    public function userInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
        ]);

        $filename = '';
        if ($request->hasFile('image')) {
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

    public function userEdit($id)
    {
        $users = User::find($id);
        return view('user.create_user', compact('users'));
    }

    public function userUpdate(Request $request, $id)
    {
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

    public function myProfile()
    {
        if (Auth::check()) {
            $userid = Auth::user()->id;
            $users = User::find($userid);
        }
        return view('user.user_profile', compact('users'));
    }
    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        // Check if the authenticated user is allowed to update this profile
        if (Auth::id() !== $user->id) {
            return redirect()->back()->with('error', 'You are not authorized to update this profile.');
        }
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user->update($validated);
    
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $user->image = $imageName;
            $user->save();
        }
    
        return redirect()->route('profile.user')->with('status', 'Profile updated successfully!');
    }
}

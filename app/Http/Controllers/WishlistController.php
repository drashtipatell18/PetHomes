<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\User;
use App\Models\Pet;

class WishlistController extends Controller
{
    public function wishlist(){
       $wishlists = Wishlist::all(); 
       return view('wishlist.view_wishlist',compact('wishlists'));
    }

    public function createWishlist(){
        $users = User::pluck('name','id')->unique();
        $pets = Pet::pluck('name','id')->unique();
        return view('wishlist.create_wishlist',compact('users','pets'));
    }

    public function storeWishlist(Request $request){
        $request->validate([
            'user_id' => 'required',
            'pet_id' => 'required'
        ]);

        $wishlist = Wishlist::create([
            'user_id' => $request->input('user_id'),
            'pet_id'  => $request->input('pet_id'),
        ]);

        session()->flash('success', 'Wishlist added successfully!');
        return redirect()->route('wishlist');
    }

    public function WishlistEdit($id){
        $wishlist = Wishlist::find($id);
        $users = User::pluck('name','id')->unique();
        $pets = Pet::pluck('name','id')->unique();
        return view('wishlist.create_wishlist',compact('wishlist','users','pets'));
    }

    public function WishlistUpdate(Request $request, $id){
        $request->validate([
            'user_id' => 'required',
            'pet_id' => 'required'
        ]);

        $wishlist = Wishlist::find($id);
        $wishlist->update([
            'user_id' => $request->input('user_id'),
            'pet_id'  => $request->input('pet_id'),
        ]);

        session()->flash('success', 'Wishlist Updated successfully!');
        return redirect()->route('wishlist');
    }

    public function WishlistDestroy($id){
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        session()->flash('danger', 'wishlist Delete successfully!');
        return redirect()->route('wishlist');
    }
}

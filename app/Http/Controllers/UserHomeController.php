<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pet;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function dashboard()
    {
        $category = Category::all();
        $pets = Pet::orderBy("created_at","desc")->limit(11)->get();
        $products = Product::orderBy("created_at","desc")->limit(5)->get();
        $catIds = Category::where('name', 'LIKE', '%cat%')->pluck("id")->toArray();
        $dogIds = Category::where('name', 'LIKE', '%dog%')->pluck("id")->toArray();
        $cats = Pet::whereIn('category_id', $catIds)->get();
        $dogs = Pet::whereIn('category_id', $dogIds)->get();

        return view("userside.home", compact("category", "pets", "products", "cats", "dogs"));
    }

    public function login(Request $request)
    {
        $request->validate([
            'loginemail' => 'required|email|exists:users,email',
            'password' => 'required|string'
        ]);

        if(Auth::attempt(['email' => $request['loginemail'], 'password' => $request['password']]))
        {
            return redirect()->route('user.dashboard');
        }

        return redirect()->route('user.dashboard')->with('loginError', 'Credentials invalid');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'registerProfilePic' => 'required|file',
            'registerName' => 'required',
            'registerEmail' => 'required|email|unique:users,email',
            'registerPhone' => 'required|min_digits:10|max_digits:10',
            'registerPassword' => 'required',
            'registerAddress' => 'required'
        ]);

        $filename = '';
        if($request->hasFile('registerProfilePic'))
        {
            $filename = time() . "." . $request->file('registerProfilePic')->getClientOriginalExtension();
            $request->file('registerProfilePic')->move('images', $filename);
        }

        User::create([
            'email' => $request->registerEmail,
            'name' => $request->registerName,
            'image' => $filename,
            'phone' => $request->registerPhone,
            'address' => $request->registerAddress,
            'role' => 'user',
            'password' => Hash::make($request->registerPassword),
        ]);

        return redirect()->route('user.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('user.dashboard');
    }

    public function getPetFromCat($catid)
    {
        $pets = Pet::where('category_id', $catid)->get();
        $category = Category::find($catid);
        $breeds = Pet::where('category_id', $catid)->distinct()->pluck('breed')->toArray();
        return view('userside.pet', compact('pets', 'category', 'breeds'));
    }

    public function getPet($petid)
    {
        $pet = Pet::find($petid);
        $admin = User::where('role', 'admin')->get()->first();

        $similars = Pet::where('category_id', $pet->category_id)->get();
        return view('userside.viewpet', compact('pet', 'admin', 'similars'));
    }

    public function contactUs()
    {
        return view('userside.contact');
    }

    public function saveContactInfo(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'numeric|required|min_digits:10|max_digits:10',
            'subject' => 'required',
            'message' => 'required'
        ]);
    }

    public function getProducts()
    {
        $products = Product::all();
        return view('userside.products', compact('products'));
    }

    public function getServices()
    {
        $services = Service::all();
        return view('userside.services', compact('services'));
    }

    public function profile()
    {
        return view('userside.profile');
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|min_digits:10|max_digits:10',
            'address' => 'required'
        ]);

        $user = Auth::user();

        $user->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        return redirect()->route('user.dashboard');
    }
}

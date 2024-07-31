<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pet;
use App\Models\Product;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function dashboard()
    {
        $category = Category::all();
        $pets = Pet::orderBy("created_at","desc")->limit(11)->get();
        $products = Product::orderBy("created_at","desc")->limit(5)->get();
        return view("userside.home", compact("category", "pets", "products"));
    }
}

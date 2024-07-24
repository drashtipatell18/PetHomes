<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category(){
        $categorys = Category::all();
        return view('category.view_category',compact('categorys'));
    }

    public function createCategory(){
        return view('category.create_category');
    }

    public function storeCategory(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
    
        $filename = '';
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
        }
    
        $category = Category::create([
            'name'      => $request->input('name'),
            'image'     => $filename
        ]);
    
        session()->flash('success', 'Category added successfully!');
        return redirect()->route('category');
    }

    public function categoryEdit($id){
        $category = Category::find($id);
        return view('category.create_category', compact('category'));
    }

    public function categoryUpdate(Request $request,$id){
        $request->validate([
            'name' => 'required',
        ]);
        $category = Category::find($id);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
            $category->image = $filename;
        }
    
        $category->update([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => bcrypt($request->input('password')),
            'phone'     => $request->input('phone'),
            'address'   => $request->input('address')
        ]);
    
        session()->flash('success', 'Category updated successfully!');
        return redirect()->route('category');
    }

    public function categoryDestroy($id){
        $category = Category::find($id);
        $category->delete();
        session()->flash('danger', 'Category Delete successfully!');
        return redirect()->route('category');
    }
}

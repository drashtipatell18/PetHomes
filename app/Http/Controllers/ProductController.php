<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function product(){
       $product = Product::all();
       return view('product.view_product',compact('product'));
    }

    public function createProduct(){
      return view('product.create_product');
    }

    public function storeProduct(Request $request){
        $request->validate([
            'name'  => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        $filename = '';
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
        }

        $product = Product::create([
            'name'             => $request->input('name'),
            'description'      => $request->input('description'),
            'price'            => $request->input('price'),
            'stock'            => $request->input('stock'),
            'image'            => $filename

        ]);

        session()->flash('success', 'Product added successfully!');
        return redirect()->route('product');
    }

    public function ProductEdit($id){
        $products = Product::find($id);
        return view('product.create_product',compact('products'));
    }

    public function ProductUpdate(Request $request, $id){
        $request->validate([
            'name'  => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        $products = Product::find($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
            $products->image = $filename;
        }

        $products->update([
            'name'             => $request->input('name'),
            'description'      => $request->input('description'),
            'price'            => $request->input('price'),
            'stock'            => $request->input('stock'),
            'image'            => $filename

        ]);

        session()->flash('success', 'Product updated successfully!');
        return redirect()->route('product');
    }

    public function ProductDestroy($id){
        $products = Product::find($id);
        $products->delete();
        session()->flash('danger', 'Product Delete successfully!');
        return redirect()->route('product');
    }
}

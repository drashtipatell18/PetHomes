<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_Item;
use App\Models\Order;
use App\Models\Product;
class OrderItemController extends Controller
{
    public function orderitem(){
        $orderitems = Order_Item::with(['order', 'product'])->get();
        return view('orderitem.view_orderitem',compact('orderitems'));
    }

    public function createOrderItem(){
        $orders = Order::pluck('id','id')->unique();
        $products = Product::pluck('name','id')->unique();
        return view('orderitem.create_orderitem',compact('products','orders'));
    }

    public function storeOrderItem(Request $request){
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';exit;
        $request->validate([
            'order_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);

        $orders = Order_Item::create([
            'order_id'   => $request->input('order_id'),
            'product_id'      => $request->input('product_id'),
            'quantity'    => $request->input('quantity'),
            'price'    => $request->input('price')
        ]);

        session()->flash('success', 'Order Item added successfully!');
        return redirect()->route('orderitem');
    }

    public function OrderItemEdit($id){
        $orderitems = Order_Item::find($id);
        $orders = Order::pluck('id','id')->unique();
        $products = Product::pluck('name','id')->unique();
        return view('orderitem.create_orderitem',compact('orderitems','products','orders'));
    }

    public function OrderItemUpdate(Request $request, $id){
        $request->validate([
            'order_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);

        $orderitems = Order_Item::find($id);
        $orderitems->update([
            'order_id'   => $request->input('order_id'),
            'product_id' => $request->input('product_id'),
            'quantity'   => $request->input('quantity'),
            'price'      => $request->input('price')
        ]);

        session()->flash('success', 'Order Item Updated successfully!');
        return redirect()->route('orderitem');
    }

    public function OrderItemDestroy($id){
        $orderitems = Order_Item::find($id);
        $orderitems->delete();
        session()->flash('danger', 'Order Item Delete successfully!');
        return redirect()->route('orderitem');
    }
}

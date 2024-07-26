<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    public function order(){
        $orders = Order::all();
        return view('order.view_order',compact('orders'));
    }

    public function createOrder(){
        $users = User::pluck('name','id');
        return view('order.create_order',compact('users'));
    }

    public function storeOrder(Request $request){
        $request->validate([
            'user_id' => 'required',
            'date' => 'required',
            'status' => 'required'
        ]);

        $orders = Order::create([
            'user_id'   => $request->input('user_id'),
            'date'      => $request->input('date'),
            'status'    => $request->input('status'),
        ]);

        session()->flash('success', 'Order added successfully!');
        return redirect()->route('order');
    } 

    public function OrderEdit($id){
        $orders = Order::find($id);
        $users = User::pluck('name','id');
        return view('service.create_service',compact('orders','users'));
    }

    public function OrderUpdate(Request $request, $id){
        $request->validate([
            'user_id' => 'required',
            'date' => 'required',
            'status' => 'required'
        ]);

        $orders = Order::find($id);
        $orders->update([
            'user_id'   => $request->input('user_id'),
            'date'      => $request->input('date'),
            'status'    => $request->input('status'),
        ]);

        session()->flash('success', 'Order updated successfully!');
        return redirect()->route('order');
    }

    public function OrderDestroy($id){
        $orders = Order::find($id);
        $orders->delete();
        session()->flash('danger', 'Order Delete successfully!');
        return redirect()->route('order');
    }
}

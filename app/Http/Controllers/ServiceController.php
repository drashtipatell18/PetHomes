<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function service(){
        $services = Service::all();
        return view('service.view_service',compact('services'));
    }

    public function createService(){
        return view('service.create_service');
    }

    public function storeService(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $filename = '';
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
        }

        $services = Service::create([
            'name'             => $request->input('name'),
            'description'      => $request->input('description'),
            'price'            => $request->input('price'),
            'image'            => $filename

        ]);

        session()->flash('success', 'Service added successfully!');
        return redirect()->route('service');
    }

    public function ServiceEdit($id){
        $services = Service::find($id);
        return view('service.create_service',compact('services'));
    }

    public function ServiceUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        $services = Service::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
            $services->image = $filename;
        }
        $services->update([
            'name'             => $request->input('name'),
            'description'      => $request->input('description'),
            'price'            => $request->input('price'),
            'image'            => $filename

        ]);

        session()->flash('success', 'Service Updated successfully!');
        return redirect()->route('service');
    }

    public function ServiceDestroy($id){
        $services = Service::find($id);
        $services->delete();
        session()->flash('danger', 'Service Delete successfully!');
        return redirect()->route('service');
    }
}

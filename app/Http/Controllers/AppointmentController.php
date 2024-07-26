<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;
class AppointmentController extends Controller
{
    public function appointment(){
        $appointments = Appointment::all();
        return view('appointment.view_appointment',compact('appointments'));
    }

    public function createAppointment(){
        $categories = Category::pluck('name','id');
        $services  = Service::pluck('name','id');
        $users  = User::pluck('name','id');
        return view('appointment.create_appointment',compact('categories','services','users'));
    }

    public function storeAppointment(Request $request){
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'pet_id'      => 'required|exists:pets,id',
            'service_id'  => 'required|exists:services,id',
            'date'        => 'required',
            'status'      => 'required',
        ]);

        $appointment = Appointment::create([
            'user_id'     => $request->input('user_id'),
            'category_id' => $request->input('category_id'),
            'pet_id'      => $request->input('pet_id'),
            'service_id'  => $request->input('service_id'),
            'date'        => $request->input('date'),
            'status'      => $request->input('status'),

        ]);

        session()->flash('success', 'Appointment added successfully!');
        return redirect()->route('appointment');
    }

    public function AppointmentEdit($id){
        $categories = Category::pluck('name','id');
        $services  = Service::pluck('name','id');
        $users  = User::pluck('name','id');
        $appointments = Appointment::find($id);
        return view('appointment.create_appointment', compact('appointments','services', 'users', 'categories'));
    }

    public function AppointmentUpdate(Request $request,$id){
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'pet_id'      => 'required|exists:pets,id',
            'service_id'  => 'required|exists:services,id',
            'date'        => 'required',
            'status'      => 'required',
        ]);

        $appointments = Appointment::find($id);
        
        $appointments->update([
            'user_id'     => $request->input('user_id'),
            'category_id' => $request->input('category_id'),
            'pet_id'      => $request->input('pet_id'),
            'service_id'  => $request->input('service_id'),
            'date'        => $request->input('date'),
            'status'      => $request->input('status'),

        ]);

        session()->flash('success', 'Appointment Updated successfully!');
        return redirect()->route('appointment');
    }

    public function AppointmentDestroy($id){
        $appointments = Appointment::find($id);
        $appointments->delete();
        session()->flash('danger', 'Appointment Delete successfully!');
        return redirect()->route('appointment');
    }
}

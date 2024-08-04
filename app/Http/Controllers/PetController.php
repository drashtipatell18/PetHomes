<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Pet;

class PetController extends Controller
{
    public function pet()
    {
        $pets = Pet::with(['user', 'category'])->get();
        return view('pet.view_pet', compact('pets'));
    }

    public function createPet()
    {
        $users = User::pluck('name', 'id')->unique();
        $categories = Category::pluck('name', 'id')->unique();
        return view('pet.create_pet', compact('users', 'categories'));
    }

    public function storePet(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'breed' => 'required',
            'age' => 'required',
            'health_info' => 'required',
            'place' => 'required',
        ]);

        $filename = [];
        if ($request->hasFile('image')){
            foreach ($request->file('image') as $image) {
                $fname = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move('images', $fname);
                $filename[] = $fname;
            }
        }

        $pet = Pet::create([
            'user_id'          => $request->input('user_id'),
            'category_id'      => $request->input('category_id'),
            'name'             => $request->input('name'),
            'breed'            => $request->input('breed'),
            'age'              => $request->input('age'),
            'health_info'      => $request->input('health_info'),
            'place'            => $request->input('place'),
            'image'            => implode(',', $filename)

        ]);

        session()->flash('success', 'Pet added successfully!');
        return redirect()->route('pet');
    }

    public function PetEdit($id)
    {
        $users = User::pluck('name', 'id')->unique();
        $categories = Category::pluck('name', 'id')->unique();
        $pets = Pet::find($id);
        return view('pet.create_pet', compact('pets', 'users', 'categories'));
    }

    public function PetUpdate(Request $request,$id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'breed' => 'required',
            'age' => 'required',
            'health_info' => 'required',
            'place' => 'required',
        ]);
        $pets = Pet::find($id);
        if ($request->hasFile('image')) {
            // $image = $request->file('image');
            // $filename = time() . '.' . $image->getClientOriginalExtension();
            // $image->move('images', $filename);
            // $pets->image = $filename;
            $filename = [];
            if ($request->hasFile('image')){
                foreach ($request->file('image') as $image) {
                    $fname = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move('images', $fname);
                    $filename[] = $fname;
                }
                $pets->image = implode(',', $filename);
            }
        }
        $pets->update([
            'user_id'          => $request->input('user_id'),
            'category_id'      => $request->input('category_id'),
            'name'             => $request->input('name'),
            'breed'            => $request->input('breed'),
            'age'              => $request->input('age'),
            'health_info'      => $request->input('health_info'),
            'place'            => $request->input('place'),
        ]);

        session()->flash('success', 'Pet Updated successfully!');
        return redirect()->route('pet');
    }

    public function PetDestroy($id)
    {
        $pets = Pet::find($id);
        $pets->delete();
        session()->flash('danger', 'Pet Delete successfully!');
        return redirect()->route('pet');
    }
}

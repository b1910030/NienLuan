<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreCarRequest;

class CarController extends Controller
{
    public function index() : View
    {
        $cars = Car::get();

        return view('admin.cars.index', compact('cars'));
    }

    public function create() : View
    {
        return view('admin.cars.create');
    }

    public function store(StoreCarRequest $request)
    {
      
        $file = $request->file('image');
        $file_name = $file->getClientOriginalName();
        $file->move(base_path('uploads'), $file_name);

        $car = new Car();
        $car->name = $request['name'];
        $car->price = $request['price'];
        $car->duration = $request['duration'];
        $car->image = $file_name;
        $car->save();

        // $data = $request->all();
        // Car::create($data);

        return redirect()->route('admin.cars.index')->with('message', 'Added Successfully !');
    }

    public function edit(Car $car) : View
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(StoreCarRequest $request, Car $car)
    {
        if($request->image){
            File::delete('storage/' . $car->image);
        }
        
        $file = $request->file('image');
        $file_name = $file->getClientOriginalName();
        $file->move(base_path('uploads'), $file_name);

        $car->name = $request['name'];
        $car->price = $request['price'];
        $car->duration = $request['duration'];
        $car->image = $file_name;
        $car->save();


        return redirect()->route('admin.cars.index')->with('message', 'Updated Successfully !');
    }

    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('admin.cars.index')->with('message', 'Deleted Successfully !');
    }
}

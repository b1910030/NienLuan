<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Tour;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreTourRequest;
use App\Http\Requests\UpdateTourRequest;
use App\Models\Category;

class TourController extends Controller
{

    public function index() : View
    {
        $tours = Tour::get();

        return view('admin.tours.index', compact('tours'));
    }

    public function create(): View
    {
        $categories = Category::get();

        return view('admin.tours.create', compact('categories'));
    }

    public function store(StoreTourRequest $request): RedirectResponse
    {
        $slug = Str::slug($request->name);        
        Tour::create($request->validated() + ["slug" => $slug]);

        return redirect()->route('admin.tours.index')->with('message', 'Added Successfully !');
    }

    public function edit(Tour $tour)
    {
        $categories = Category::get();

        return view('admin.tours.edit', compact('tour', 'categories'));
    }

    public function update(UpdateTourRequest $request, Tour $Tour)
    {
        $slug = Str::slug($request->name);
        $Tour->update($request->validated() + ["slug" => $slug]);

        return redirect()->route('admin.tours.index')->with('message', 'Updated Successfully !');;
    }

    public function destroy(Tour $Tour): RedirectResponse
    {
        $Tour->delete();

        return redirect()->route('admin.tours.index')->with('message', 'Deleted Successfully');
    }
}

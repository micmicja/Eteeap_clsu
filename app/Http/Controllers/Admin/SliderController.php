<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    try {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Save in storage/app/public/sliders
            $image->storeAs('public/sliders', $imageName);

            // Save the public URL path to DB
            \App\Models\Slider::create([
                'title' => $request->title,
                'image_path' => 'storage/sliders/' . $imageName,
            ]);

            return redirect()->route('admin.slider.index')->with('success', 'Slider uploaded successfully!');
        }

        return back()->with('error', 'Image upload failed.');
    } catch (\Exception $e) {
        return back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}

    public function destroy($id)
{
    try {
        $slider = \App\Models\Slider::findOrFail($id);

        // Delete image file if it exists
        $imagePath = public_path($slider->image_path);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Delete DB record
        $slider->delete();

        return redirect()->route('admin.slider.index')->with('success', 'Slider deleted successfully!');
    } catch (\Exception $e) {
        return back()->with('error', 'Failed to delete slider: ' . $e->getMessage());
    }
}
public function edit($id)
{
    $slider = \App\Models\Slider::findOrFail($id);
    return view('admin.slider.edit', compact('slider'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    try {
        $slider = \App\Models\Slider::findOrFail($id);
        $slider->title = $request->title;

        // Handle image replacement if a new one is uploaded
        if ($request->hasFile('image')) {
            // Delete old image
            $oldImagePath = public_path($slider->image_path);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/sliders'), $imageName);
            $slider->image_path = 'uploads/sliders/' . $imageName;
        }

        $slider->save();

        return redirect()->route('admin.slider.index')->with('success', 'Slider updated successfully!');
    } catch (\Exception $e) {
        return back()->with('error', 'Failed to update slider: ' . $e->getMessage());
    }
}

}


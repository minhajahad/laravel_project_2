<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.sliders.index', ['sliders' => $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create.slider');
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $image = $request->file('slider_image');
        // $fileName = hexdec(uniqid()).'.'.
        //     $image->getClientOriginalExtension();
        // Image::make($image)->resize(2376,807)->save('upload/slider/'.$fileName);
        // $save_url = 'upload/slider/'.$fileName;
        Slider::create([
            'slider_title' => $request->slider_title,
            'short_title' => $request->short_title,
            'slider_image' => $this->uploadImage(request()->file('slider_image')),
        ]);
        return redirect()->route('sliders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return view('backend.sliders.show', ['slider' => $slider]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('backend.sliders.edit', ['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        // $image = $request->file('slider_image');
        // $fileName = hexdec(uniqid()).'.'.
        //     $image->getClientOriginalExtension();
        // Image::make($image)->resize(2376,807)->save('upload/slider/'.$fileName);
        // $save_url = 'upload/slider/'.$fileName;
        $slider->update([
            'slider_title' => $request->slider_title,
            'short_title' => $request->short_title,
            'slider_image' => $this->uploadImage(request()->file('slider_image')),
        ]);
        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('sliders.index');
    }

    public function uploadImage($file)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        Image::make($file)->resize(400, 400)->save(storage_path() . '/app/public/sliders/' . $fileName);

        return $fileName;
    }
}

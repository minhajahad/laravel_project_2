<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class Brandcontroller extends Controller
{
    public function index()
    {
        $brands =  Brand::all();
        return view('backend.brands.index', [
            'brands' => $brands
        ]);
    }

    public function create()
    {
        return view('backend.brands.create');
    }

    public function store(Request $request)
    {
        // $image = $request->file('brand_image');
        // $fileName = hexdec(uniqid()) . '.' .
        //     $image->getClientOriginalExtension();
        // Image::make($image)->resize(2376, 807)->save('upload/brand/' . $fileName);
        // $save_url = 'upload/brand/' . $fileName;
        Brand::create([
            'brand_name' => $request->brand_name,
            'brand_slug' => $request->brand_slug,
            'brand_image' => $this->uploadImage(request()->file('brand_image')),
        ]);
        return redirect()->route('brands.index')->withMessage('Brands Added succesfully');
    }

    public function show(Brand $brand)
    {
        return view('backend.brands.show', ['brand' => $brand]);
    }

    public function edit(Brand $brand)
    {
        return view('backend.brands.edit', ['brand' => $brand]);
    }

    public function update(Request $request, Brand $brand)
    {
        // $image = $request->file('brand_image');
        // $fileName = hexdec(uniqid()) . '.' .
        //     $image->getClientOriginalExtension();
        // Image::make($image)->resize(2376, 807)->save('upload/brand/' . $fileName);
        // $save_url = 'upload/brand/' . $fileName;
        $brand->update([
            'brand_name' => $request->brand_name,
            'brand_slug' => $request->brand_slug,
            'brand_image' => $this->uploadImage(request()->file('brand_image')),
        ]);
        return redirect()->route('brands.index')->withMessage('Brands updated succesfully');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index');
    }

    public function uploadImage($file)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        Image::make($file)->resize(400, 400)->save(storage_path() . '/app/public/brands/' . $fileName);

        return $fileName;
    }
}

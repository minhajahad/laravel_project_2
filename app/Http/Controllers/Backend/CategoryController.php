<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;

class CategoryController extends Controller
{
    public function index()
    {
        $categories =  Category::all();
        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(Request $request)
    {
        // $image = $request->file('category_image');
        // $fileName = hexdec(uniqid()) . '.' .
        //     $image->getClientOriginalExtension();
        // Image::make($image)->resize(2376, 807)->save('upload/category/' . $fileName);
        // $save_url = 'upload/category/' . $fileName;
        Category::create([
            'category_name' => $request->category_name,
            'category_slug' => $request->category_slug,
            'category_image' => $this->uploadImage(request()->file('category_image')),
        ]);
        return redirect()->route('categories.index')->withMessage('Categories Added succesfully');
    }

    public function show(Category $category)
    {
        return view('backend.categories.show', ['category' => $category]);
    }

    public function edit(Category $category)
    {
        return view('backend.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        // $image = $request->file('category_image');
        // $fileName = hexdec(uniqid()) . '.' .
        //     $image->getClientOriginalExtension();
        // Image::make($image)->resize(2376, 807)->save('upload/category/' . $fileName);
        // $save_url = 'upload/category/' . $fileName;
        $category->update([
            'category_name' => $request->category_name,
            'category_slug' => $request->category_slug,
            'category_image' => $this->uploadImage(request()->file('category_image')),
        ]);
        return redirect()->route('categories.index')->withMessage('Categories updated succesfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }

    public function uploadImage($file)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        Image::make($file)->resize(400, 400)->save(storage_path() . '/app/public/categories/' . $fileName);

        return $fileName;
    }
}

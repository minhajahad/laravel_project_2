<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.products.create',compact('brands','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $image = $request->file('product_image');
        // $fileName = hexdec(uniqid()) . '.' .
        //     $image->getClientOriginalExtension();
        // Image::make($image)->resize(2376, 807)->save('upload/product/' . $fileName);
        // $save_url = 'upload/product/' . $fileName;
        Product::create([
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace('', '.', $request->product_slug)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'product_image' => $this->uploadImage(request()->file('product_image')),
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
        ]);
        return redirect()->route('products.index');
    }

    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);
        return redirect()->route('products.index')->withMessage('Product Active Succesfully');
    }
    public function ProductInActive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        return redirect()->route('products.index')->withMessage('Product Inactive Succesfully');
    }

    /**
     * Display the specified resource.
     */

    public function show(Product $product)
    {
        return view('backend.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.products.edit', ['product' => $product], compact('brands', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // $image = $request->file('product_image');
        // $fileName = hexdec(uniqid()) . '.' .
        //     $image->getClientOriginalExtension();
        // Image::make($image)->resize(2376, 807)->save('upload/product/' . $fileName);
        // $save_url = 'upload/product/' . $fileName;
        try {
            $requestData = ([
                'product_name' => $request->product_name,
                'product_slug' => strtolower(str_replace('', '.', $request->product_slug)),
                'product_code' => $request->product_code,
                'product_qty' => $request->product_qty,
                'product_tags' => $request->product_tags,
                'product_size' => $request->product_size,
                'product_color' => $request->product_color,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'short_descp' => $request->short_descp,
                'long_descp' => $request->long_descp,
                // 'product_image' => $this->uploadImage(request()->file('product_image')),
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
            ]);
            if ($request->hasFile('product_image')) {
                $requestData['product_image'] = $this->uploadImage(request()->file('product_image'));
            }
            $product->update($requestData);
            return redirect()->route('products.index')->withMessage('Product info updated succesfully');
        } 
        catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function uploadImage($file)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        Image::make($file)->resize(400, 400)->save(storage_path() . '/app/public/products/' . $fileName);

        return $fileName;
    }
}
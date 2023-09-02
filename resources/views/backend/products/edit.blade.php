<x-backend.layouts.master>
    <h1 class="h3 mb-3">Products</h1>

    <div class="card-header">
        Edit Product <a class="btn btn-info mx-2" href="{{route('products.index')}}">List</a>

    </div>
    <div class="card-body">
        <form action="{{route('products.update', ['product'=>$product->id])}}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Product Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="product_name"
                        value="{{old('product_name',$product->product_name)}}">
                    @error('product_name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Product Slug</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="product_slug"
                        value="{{old('product_slug',$product->product_slug)}}">
                    @error('product_name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Product Code</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="product_code"
                        value="{{old('product_code',$product->product_code)}}">
                    @error('product_code')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Product Quantity</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="product_qty"
                        value="{{old('product_qty',$product->product_qty)}}">
                    @error('product_qty')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Product Tags</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="product_tags"
                        value="{{old('product_tags',$product->product_tags)}}">
                    @error('product_tags')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Product Size</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="product_size"
                        value="{{old('product_size',$product->product_size)}}">
                    @error('product_size')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Product Color</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="product_color"
                        value="{{old('product_color',$product->product_color)}}">
                    @error('product_color')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Selling Price</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="selling_price"
                        value="{{old('selling_price',$product->selling_price)}}">
                    @error('selling_price')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Discount Price</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="discount_price"
                        value="{{old('discount_price',$product->discount_price)}}">
                    @error('discount_price')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Short Description</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="short_descp"
                        value="{{old('short_descp',$product->short_descp)}}">
                    @error('short_descp')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="floatingTextarea2" class="col-sm-3 col-form-label">Description</label>
                <div class="form-floating col-8">
                    <textarea name="long_descp" class="form-control" placeholder="Leave a comment here"
                        id="floatingTextarea2" style="height: 100px">
                        {!! $product->long_descp !!}
                    </textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPicture" class="col-sm-3 col-form-label">Picture</label>
                <div class="col-8">
                    <img src="/storage/products/{{($product->product_image)}}" style="width: 300px; height: 300px;"><br><br>
                    <input type="file" class="form-control" id="inputPicture" name="product_image"
                        value="{{old('product_image',$product->product_image)}}">
                    @error('product_image')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPicture" class="col-sm-3 col-form-label">Category</label>
                <div class="col-8">
                    <select name="category_id" class="form-select">
                        <option></option>
                        @foreach($categories as $category)
                       
                        <option value="{{$category->id}}" {{$category->id == $product->category_id? 'selected':''}}>
                        {{$category->category_name}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPicture" class="col-sm-3 col-form-label">Brand</label>
                <div class="col-8">
                    <select name="brand_id" class="form-select">
                        <option></option>
                        @foreach($brands as $brand)
                        
                        <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'selected':''}}>
                        {{$brand->brand_name}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
            </div>
        </form>
    </div>
</x-backend.layouts.master>
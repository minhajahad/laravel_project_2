<x-backend.layouts.master>
    <h1 class="h3 mb-3">Products</h1>
    <div class="card-header">
        Create Products <a class="btn btn-info mx-2" href="{{route('products.index')}}">List</a>

    </div>
    <div class="card-body">
        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Product Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="product_name" value="">
                    @error('product_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Product Slug</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="product_slug" value="">
                    @error('product_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Product Code</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="product_code" value="">
                    @error('product_code')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Product Quantity</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="product_qty" value="">
                    @error('product_qty')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Product Tags</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="product_tags" value="">
                    @error('product_tags')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Product Size</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="product_size" value="">
                    @error('product_size')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Product Color</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="product_color" value="">
                    @error('product_color')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Selling Price</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="selling_price" value="">
                    @error('selling_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Discount Price</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="discount_price" value="">
                    @error('discount_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Short Description</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="short_descp" value="">
                    @error('short_descp')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="floatingTextarea2" class="col-sm-3 col-form-label">Description</label>
                <div class="form-floating  col-8">
                    <textarea name="long_descp" class="form-control" placeholder="Leave a comment here"
                        id="floatingTextarea2" style="height: 100px">
                    </textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPicture" class="col-sm-3 col-form-label">Picture</label>
                <div class="col-8">
                    <input type="file" class="form-control" id="inputPicture" name="product_image" value="">
                    @error('product_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPicture" class="col-sm-3 col-form-label">Category</label>
                <div class="col-8">
                    <select name="category_id" class="form-select">
                        <option></option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
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
                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </div>
        </form>
    </div>
</x-backend.layouts.master>
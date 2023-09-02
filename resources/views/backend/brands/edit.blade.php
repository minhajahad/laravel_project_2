<x-backend.layouts.master>
    <h1 class="h3 mb-3"> Brand</h1>

    <div class="card-header">
        Edit Brand <a class="btn btn-info mx-2" href="{{route('brands.index')}}">List</a>

    </div>

    <div class="card-body">
        <form action="{{route('brands.update',['brand'=>$brand->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div>
                <div class="mb-3">
                    <label for="inputTitle" class="col-sm-3 col-form-label">Title</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="inputTitle" name="brand_name" value="{{old('brand_name', $brand->brand_name)}}">

                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputBrandTitle" class="col-sm-3 col-form-label">Brand Title</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="inputBrandTitle" name="brand_slug" value="{{old('brand_slug', $brand->brand_slug)}}">
                    </div>
                </div>


                <div class="mb-3">
                    <label for="inputPicture" class="col-sm-3 col-form-label">Picture</label>
                    <div class="col-8">
                        <input type="file" class="form-control" id="inputPicture" name="brand_image" value="{{old('brand_image', $brand->brand_image)}}">

                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>

                </div>
            </div>

        </form>
    </div>

</x-backend.layouts.master>
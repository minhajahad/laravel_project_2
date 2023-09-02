<x-backend.layouts.master>
    <h1 class="h3 mb-3"> Slider</h1>
    <div class="card-header">
        
        Create Slider <a class="btn btn-info mx-2" href="{{route('sliders.index')}}">List</a>
    </div>
    <div class="card-body">
        <form action="{{route('sliders.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Title</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputTitle" name="slider_title" value="">
                    @error('slider_title')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="inputShortTitle" class="col-sm-3 col-form-label">Short Title</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="inputShortTitle" name="short_title" value="">
                    @error('short_title')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>


            <div class="mb-3">
                <label for="inputPicture" class="col-sm-3 col-form-label">Picture</label>
                <div class="col-8">
                    <input type="file" class="form-control" id="inputPicture" name="slider_image" value="">
                    @error('slider_image')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

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
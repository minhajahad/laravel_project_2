<x-backend.layouts.master>


    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="card-header">
                Show <a class="btn btn-info mx-2" href="{{route('brands.index')}}">List</a>
            </div>
            <div class="card-body">

                <h5>Title: {{$brand->brand_name}}</h5>
                <h6>Title: {{$brand->brand_slug}}</h6>
                <h1><img src="/storage/brands/{{($brand->brand_image)}}" style="width: 300px; height: 200px;">
                </h1>

            </div>
        </div>
    </div>


</x-backend.layouts.master>
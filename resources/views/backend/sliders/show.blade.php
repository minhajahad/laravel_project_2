<x-backend.layouts.master>
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="card-header">
                Show <a class="btn btn-info mx-2" href="{{route('sliders.index')}}">List</a>
            </div>
            <div class="card-body">
                <h5>Title: {{$slider->slider_title}}</h5>
                <h6>Title: {{$slider->short_title}}</h6>
                <h1><img src="/storage/sliders/{{($slider->slider_image)}}" style="width: 300px; height: 200px;"></h1>
            </div>
        </div>
    </div>


</x-backend.layouts.master>
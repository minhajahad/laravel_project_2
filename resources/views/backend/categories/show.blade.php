<x-backend.layouts.master>


    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="card-header">
                Show <a class="btn btn-info mx-2" href="{{route('categories.index')}}">List</a>
            </div>
            <div class="card-body">

                <h5>Title: {{$category->category_name}}</h5>
                <h6>Title: {{$category->category_slug}}</h6>
                <h1><img src="/storage/categories/{{($category->category_image)}}" style="width: 300px; height: 200px;">
                </h1>

            </div>
        </div>
    </div>


</x-backend.layouts.master>
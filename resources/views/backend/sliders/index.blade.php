<x-backend.layouts.master>
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="card-header">
                @can('create.slider')
                <a class="btn btn-info mx-2" href="{{route('sliders.create')}}">Add Sliders</a>
                All Sliders <span class="badge rounded-pill bg-danger"> {{count($sliders)}}</span>
                @endcan
            </div>
            <div class="card-body">
                @if(session('message'))
                <div class="alert alert-success">
                    <span class="close" data-dismiss="alert"></span>
                    <strong>{{session('message')}}</strong>
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col"> Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sl=0 @endphp
                            @foreach($sliders as $slider)
                            <tr>
                                <td>{{++$sl}}</td>
                                <td>{{$slider->slider_title}}</td>
                                <td>{{$slider->short_title}}</td>
                                <td><img src="/storage/sliders/{{($slider->slider_image)}}"
                                        style="width: 70px;height: 40px;"></td>
                                <td>
                                    <a href="{{route('sliders.show',['slider'=>$slider->id])}}"><i
                                            class=" fa fa-eye"></i></a>
                                    <a href="{{route('sliders.edit',['slider'=>$slider->id])}}"><i
                                            class=" fa fa-pencil"></i></a>
                                    <form style="display:inline"
                                        action="{{ route('sliders.destroy', ['slider' => $slider->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('are sure want delete?')" style="font-size: 11px"><i
                                                class=" fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-backend.layouts.master>
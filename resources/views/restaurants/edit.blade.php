@extends('layouts.main')
@section('content')
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            @include('layouts.alerts')
            <div class="card-header border-0">
                <h2 class="card-title pl-5">
                    Edit Restaurant
                </h2>
            </div>
            <div class="card-body">
                <form class="container" method="POST" action="{{ route('restaurants.update', $restaurant->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Location ID</label>
                                <input type="number" name="location_id" value="{{ $restaurant->location_id }}" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label> Restaurant Type ID</label>
                                <input type="number" name="restaurant_type_id" value="{{ $restaurant->restaurant_type_id }}" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label> Category</label>
                                <input type="text" name="category" value="{{ $restaurant->category }}" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label> Restaurant Name </label>
                                <input type="text" name="name" value="{{ $restaurant->name }}" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label> Guide info </label>
                                <textarea name="guide_info" rows="5" class="form-control">{{ $restaurant->guide_info }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Update Image<small>(Optional)</small> </label>
                                <input name="img" type="file" class="form-control">
                            </div>
                            <div class="form-group">
                                <a title="Click to Download Image!" href="{{ asset('images/restaurants/'.$restaurant->img) }}" download>
                                    <img src="{{ asset('images/restaurants/'.$restaurant->img) }}" class="mt-1 image_width">
                                </a>
                            </div>
                            <div class="form-group">
                                <label>Extra Images</label>
                                <div class="row">
                                    @foreach ($restaurant->images as $img)
                                    <div class="col-md-2 text-center">
                                        <a title="Delete this Image" href="{{ route('restaurant_image.delete', $img->id) }}"><i class="fa fa-trash"></i></a><br>
                                        <img src="{{ asset('images/restaurants/'.$img->image) }}" class="mt-1 extra_images" style="width:90%; margin: auto;">
                                    </div>
                                   @endforeach
                               </div>
                           </div>
                           <div class="form-group">
                                <label>Upload Extra Images</label>
                                <div class="form-group">
                                    <label> Extra 5 Images </label>
                                    <input name="images[]" type="file" multiple class="form-control">
                                </div>
                        </div>
                       </div>
                        <div class="col-md-3 offset-md-4 mt-5">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-block btn-lg p-3 border-radius-3">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
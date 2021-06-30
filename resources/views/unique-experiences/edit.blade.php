@extends('layouts.main')
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            @include('layouts.alerts')
            <div class="card-header border-0">
                <h2 class="card-title pl-5">
                   Edit Unique Experience 
                </h2>
            </div>
            <div class="card-body">
               <form class="container" action="{{ route('unique-experiences.update', $unique_experience->id) }}" method="post" enctype="multipart/form-data"> 
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Title</label>
                            <input type="text" name="title" value="{{ $unique_experience->title }}" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label> Location </label>
                            <input type="text" name="location" value="{{ $unique_experience->location }}" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label> Duration </label>
                            <input type="text" name="duration" value="{{ $unique_experience->duration }}" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label> Cost </label>
                            <input type="number" name="cost" value="{{ $unique_experience->cost }}" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label> Stars </label>
                            <input type="number" name="stars" value="{{ $unique_experience->stars }}" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label> No. of Reviews </label>
                            <input type="number" name="no_of_reviews" value="{{ $unique_experience->no_of_reviews }}" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Guide info </label>
                            <textarea name="guide_info" rows="5" class="form-control">{{ $unique_experience->guide_info }}</textarea>
                        </div>
                        <div class="form-group">
                            <label> Cover Image </label>
                            <input name="img" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <a title="Click to Download Image!" href="{{ asset('images/unique-experiences/'.$unique_experience->cover_image) }}" download>
                                <img src="{{ asset('images/unique-experiences/'.$unique_experience->cover_image) }}" class="image_width">
                            </a>
                        </div>
                        <div class="form-group">
                            <label> Extra 5 Images </label>
                            <input name="images[]" type="file" multiple class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Extra Images</label>
                            <div class="row">
                                @foreach ($unique_experience->images as $img)
                                <div class="col-md-2 text-center">
                                    <a title="Delete this Image" href="{{ route('unique-experiences.delete', $img->id) }}"><i class="fa fa-trash"></i></a><br>
                                    <img src="{{ asset('images/unique-experiences/'.$img->image) }}" class="mt-1 extra_images">
                                </div>
                               @endforeach
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
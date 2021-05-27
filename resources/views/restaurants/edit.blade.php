@extends('layouts.main')
@section('content')
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            @include('layouts.alerts')
            <div class="card-header border-0">
                <h2 class="card-title pl-5">
                    Add Restaurant
                </h2>
            </div>
            <div class="card-body">
                <form class="container" method="POST" action="{{ route('restaurants.update', $restaurant->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $restaurant->id }}"> 
                    <div class="row">
                        <div class="col-md-6">
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
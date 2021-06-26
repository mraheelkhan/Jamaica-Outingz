@extends('layouts.main')
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            @include('layouts.alerts')
            <div class="card-header border-0">
                <h2 class="card-title pl-5">
                   Edit Tour 
                </h2>
            </div>
            <div class="card-body">
                <form class="container" action="{{ route('tours.update', $tour->id) }}" method="post" enctype="multipart/form-data"> 
                @csrf
                @method('PUT')  
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label> Tour Name</label>
                               <input type="text" name="tour_name" value="{{ $tour->tour_name }}" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Location </label>
                               <input type="text" name="location" value="{{ $tour->location }}" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Duration </label>
                               <input type="text" name="duration" value="{{ $tour->duration }}" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Cost </label>
                               <input type="number" name="cost" value="{{ $tour->cost }}" class="form-control"/>
                           </div>
                       </div>
                       <div class="col-md-6">
                        <div class="form-group">
                            <label> Guide info </label>
                            <textarea name="guide_info" rows="5" class="form-control">{{ $tour->guide_info }}</textarea>
                        </div>
                        <div class="form-group">
                            <label> Update Image<small>(Optional)</small> </label>
                            <input name="img" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <a title="Click to Download Image!" href="{{ asset('images/tours/'.$tour->img) }}" download>
                                <img src="{{ asset('images/tours/'.$tour->img) }}" style="width:70%; margin: auto;"></td>
                            </a>
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
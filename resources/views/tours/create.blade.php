@extends('layouts.main')
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            @include('layouts.alerts')
            <div class="card-header border-0">
                <h2 class="card-title pl-5">
                   Add Tour 
                </h2>
            </div>
            <div class="card-body">
                <form class="container" action="{{ route('tours.store') }}" method="post" enctype="multipart/form-data"> 
                @csrf  
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label> Tour Name</label>
                               <input type="text" name="tour_name" value="{{ old('tour_name') }}" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Location </label>
                               <input type="text" name="location" value="{{ old('location') }}" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Duration </label>
                               <input type="text" name="duration" value="{{ old('duration') }}" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Cost </label>
                               <input type="number" name="cost" value="{{ old('cost') }}" class="form-control"/>
                           </div>
                       </div>
                       <div class="col-md-6">
                            <div class="form-group">
                                <label> Guide info </label>
                                <textarea name="guide_info" value="{{ old('guide_info') }}" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label> Cover Image </label>
                                <input name="img" type="file" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Extra 5 Images </label>
                                <input name="images[]" type="file" multiple class="form-control">
                            </div>
                       </div>
                       <div class="col-md-3 offset-md-4 mt-5">
                           <div class="form-group text-center">
                               <button type="submit" class="btn btn-primary btn-block btn-lg p-3 border-radius-3">
                                   Save
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
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
               <form class="container" action="{{ route('restaurants.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label> Location ID</label>
                               <input type="number" name="location_id" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Restaurant Type ID</label>
                               <input type="number" name="restaurant_type_id" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Category</label>
                               <input type="text" name="category" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Restaurant Name </label>
                               <input type="text" name="name" class="form-control"/>
                           </div>
                            <div class="form-group">
                                <label> Guide info </label>
                                <textarea name="guide_info" rows="5" class="form-control"></textarea>
                            </div>
                       </div>
                       <div class="col-md-6">
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
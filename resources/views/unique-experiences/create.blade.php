@extends('layouts.main')
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            @include('layouts.alerts')
            <div class="card-header border-0">
                <h2 class="card-title pl-5">
                   Add Unique Experience 
                </h2>
            </div>
            <div class="card-body">
               <form class="container" action="{{ route('unique-experiences.store') }}" method="post"> 
                @csrf   
                    <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label> Category </label>
                               <input type="text" name="category" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Unique Experience Name </label>
                               <input type="text" name="unique_experience_name" class="form-control"/>
                           </div>
                        <div class="form-group">
                            <label> Guide info </label>
                            <textarea name="guide_info" rows="5" class="form-control"></textarea>
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
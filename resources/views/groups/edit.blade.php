@extends('layouts.main')
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            @include('layouts.alerts')
            <div class="card-header border-0">
                <h2 class="card-title pl-5">
                   Edit Group Package 
                </h2>
            </div>
            <div class="card-body">
               <form class="container" action="{{ route('group-packages.update', $group_package->id) }}" method="post"> 
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $group_package->id }}">
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label> Tour Name</label>
                               <input type="text" name="tour_name" value="{{ $group_package->tour_name }}" class="form-control"/>
                           </div>
                            <div class="form-group">
                                <label> Guide info </label>
                                <textarea name="guide_info" rows="5" class="form-control">{{ $group_package->guide_info }}</textarea>
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
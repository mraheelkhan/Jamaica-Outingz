@extends('layouts.main')
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            @include('layouts.alerts')
            <div class="card-header border-0">
                <h2 class="card-title pl-5">
                   Edit Merchandise 
                </h2>
            </div>
            <div class="card-body">
                <form class="container" action="{{ route('merchendises.update', $merchendise->id) }}" method="post"> 
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $merchendise->id }}">
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label> Category</label>
                               <input type="text" name="category" value="{{ $merchendise->category }}" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Type </label>
                               <input type="text" name="type" value="{{ $merchendise->type }}" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Cost </label>
                               <input type="number" name="cost" value="{{ $merchendise->cost }}" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label> Brand </label>
                                <input type="text" name="brand" value="{{ $merchendise->brand }}" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> SKU</label>
                                <input type="text" name="sku" value="{{ $merchendise->sku }}" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label> Color </label>
                                <input type="text" name="color" value="{{ $merchendise->color }}" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label> Available Sizes </label>
                                <input type="text" name="available_size" value="{{ $merchendise->available_size }}" class="form-control"/>
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
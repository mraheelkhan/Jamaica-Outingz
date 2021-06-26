@extends('layouts.main')
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
        @include('layouts.alerts')
            <div class="card-header border-0">
                <h2 class="card-title pl-5">
                   Edit Location
                </h2>
            </div>
            <div class="card-body">
               <form class="container" method="POST" action="{{ route('locations.update', $location->id) }}">
                @csrf 
                @method('PUT')
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label> Location Name </label>
                               <input type="text" name="name" value="{{ $location->name }}" class="form-control"/>
                           </div>
                       </div>
                       <div class="col-md-6">
                       </div>
                       <div class="col-md-3 offset-md-4 mt-5">
                           <div class="form-group text-center">
                               <button class="btn btn-primary btn-block btn-lg p-3 border-radius-3">
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
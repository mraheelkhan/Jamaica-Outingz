@extends('layouts.main')
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            @include('layouts.alerts')
            <div class="card-header border-0">
                <h2 class="card-title pl-5">
                   Add Pickup 
                </h2>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
               <form class="container" method="POST" action="{{ route('tour-guides.store') }}"> 
                @csrf  
                <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label> First Name</label>
                               <input type="text" name="first_name" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Last Name </label>
                               <input type="text" name="last_name" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Email Address </label>
                               <input type="text" name="email" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Contact Number </label>
                               <input type="text" name="contact" class="form-control"/>
                           </div>
                       </div>
                       <div class="col-md-6">
                            <div class="form-group">
                                <label> Pick up at Hotel Name </label>
                                <input type="text" name="pickup_at_hotel_name" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label> Pick up at Hotel Address </label>
                                <input type="text" name="pickup_at_hotel_address" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label> Hotel room </label>
                                <input type="text" name="hotel_room" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label> Name of Cruiseline - Pick Up </label>
                                <input type="text" name="name_of_cruiseline" class="form-control"/>
                            </div>
                       </div>
                       <div class="col-md-3 offset-md-4 mt-5">
                           <div class="form-group text-center">
                               <button class="btn btn-primary btn-block btn-lg p-3 border-radius-3">
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
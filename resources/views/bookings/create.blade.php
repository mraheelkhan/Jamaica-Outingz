@extends('layouts.main')
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <h2 class="card-title pl-5">
                   Add Booking 
                </h2>
            </div>
            <div class="card-body">
               <form class="container"> 
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label> First Name </label>
                               <input type="text" name="tour_name" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Last Name </label>
                               <input type="text" name="location" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Email Address </label>
                               <input type="text" name="duration" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Contact Number</label>
                               <input type="text" name="cost" class="form-control"/>
                           </div>
                       </div>
                       <div class="col-md-6">
                        <div class="form-group">
                            <label> Hotel Name </label>
                            <input type="text" name="tour_name" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label> Hotel Address </label>
                            <input type="text" name="location" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label> Hotel Room </label>
                            <input type="text" name="duration" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label> Booking Date</label>
                            <input type="text" name="cost" class="form-control"/>
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
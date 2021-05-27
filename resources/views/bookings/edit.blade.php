@extends('layouts.main')
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            @include('layouts.alerts')
            <div class="card-header border-0">
                <h2 class="card-title pl-5">
                   Edit Booking 
                </h2>
            </div>
            <div class="card-body">
               <form class="container" action="{{ route('bookings.update', $booking->id) }}" method="post"> 
                @csrf
                @method('PUT')
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label> First Name </label>
                               <input type="text" name="first_name" value="{{ $booking->first_name }}" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Last Name </label>
                               <input type="text" name="last_name" value="{{ $booking->last_name }}" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Email Address </label>
                               <input type="text" name="email" value="{{ $booking->email }}" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Contact Number</label>
                               <input type="text" name="contact" value="{{ $booking->contact }}" class="form-control"/>
                           </div>
                       </div>
                       <div class="col-md-6">
                        <div class="form-group">
                            <label> Hotel Name </label>
                            <input type="text" name="hotel_name" value="{{ $booking->hotel_name }}" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label> Hotel Address </label>
                            <input type="text" name="hotel_address" value="{{ $booking->hotel_address }}" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label> Hotel Room </label>
                            <input type="text" name="hotel_room" value="{{ $booking->hotel_room }}" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label> Booking Date</label>
                            <input type="text" name="booking_date" value="{{ $booking->booking_date }}" class="form-control"/>
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
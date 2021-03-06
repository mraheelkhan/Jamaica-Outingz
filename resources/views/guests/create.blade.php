@extends('layouts.main')
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            @include('layouts.alerts')
            <div class="card-header border-0">
                <h2 class="card-title pl-5">
                   Add Guest 
                </h2>
            </div>
            <div class="card-body">
                <form class="container" action="{{ route('registered-guests.store') }}" method="post"> 
                @csrf 
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label> Guest Name</label>
                               <input type="text" name="guest_name" value="{{ old('guest_name') }}" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Email Address </label>
                               <input type="text" name="email" value="{{ old('email') }}" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Phone Number </label>
                               <input type="text" name="phone" value="{{ old('phone') }}" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Country </label>
                               <input type="text" name="country" value="{{ old('country') }}" class="form-control"/>
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="form-group">
                               <label> Password</label>
                               <input type="password" name="password" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Confirm Password </label>
                               <input type="password" name="password_confirmation" class="form-control"/>
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
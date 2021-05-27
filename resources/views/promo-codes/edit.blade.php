@extends('layouts.main')
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <h2 class="card-title pl-5">
                   Add Promo Code 
                </h2>
            </div>
            <div class="card-body">
               <form class="container" method="POST" action="{{ route('promo-codes.update', $promoCode->id) }}">
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
                               <label> Customer ID </label>
                               <input type="text" name="customer_id" value="{{ $promoCode->customer_id }}" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Guest Name </label>
                               <input type="text" name="guest_name"  value="{{ $promoCode->guest_name }}"  class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Promo Code </label>
                               <input type="text" name="promo_code"  value="{{ $promoCode->promo_code }}" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Discount % </label>
                               <input type="text" name="discount" value="{{ $promoCode->discount }}"  class="form-control"/>
                           </div>
                       </div>
                       <div class="col-md-6">
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
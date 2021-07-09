@extends('layouts.main')
@section('page')
    Pickups
@endsection
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="card-title">
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>S No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email Address</th>
                            <th>Contact Number</th>
                            <th>Hotel Number</th>
                            <th>Hotel Address</th>
                            <th>Destination</th>
                            <th>Booking Date</th>
                            <th>Pickup Date</th>
                            <th>Pickup Time</th>
                            <th>Adult</th>
                            <th>Children</th>
                            <th>User</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($pickups as $pickup)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $pickup->first_name }}</td>
                                <td>{{ $pickup->last_name }}</td>
                                <td>{{ $pickup->email }}</td>
                                <td>{{ $pickup->contact }}</td>
                                <td>{{ $pickup->hotel_number }}</td>
                                <td>{{ $pickup->hotel_address }}</td>
                                <td>{{ $pickup->destination }}</td>
                                <td>{{ $pickup->booking_date }}</td>
                                <td>{{ $pickup->pickup_date }}</td>
                                <td>{{ $pickup->pickup_time }}</td>
                                <td>{{ $pickup->adults }}</td>
                                <td>{{ $pickup->childrens }}</td>
                                <td>{{ $pickup->user->name }}</td>
                                
                                <td>
                                    <form method="POST" action="{{ route('pickups.destroy', $pickup->id ) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-outline-danger border-0">
                                            <i class="fas fa-trash fa-lg"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
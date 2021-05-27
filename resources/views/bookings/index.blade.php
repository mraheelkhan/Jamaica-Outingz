@extends('layouts.main')
@section('page')
    Bookings
@endsection
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="card-title">
                </div>
                <div class="float-right">
                    <a href="{{ route('bookings.create') }}" class="btn btn-block btn-outline-primary border-0">
                        <i class="fas fa-plus fa-xs"></i> Add Booking
                    </a>
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
                            <th>Hotel Name</th>
                            <th>Hotel Address</th>
                            <th>Hotel Room</th>
                            <th>Booking Date</th>
                        </thead>
                        <tbody>
                            @foreach($bookings as $record)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td> {{ $record['first_name'] }}</td>
                                <td>{{ $record['last_name'] }}</td>
                                <td>{{ $record['email'] }}</td>
                                <td>{{ $record['contact'] }}</td>
                                <td>{{ $record['hotel_name'] }}</td>
                                <td>{{ $record['hotel_address'] }}</td>
                                <td>{{ $record['hotel_room'] }}</td>
                                <td>{{ $record['booking_date'] }}</td>
                                <td>
                                    <a href="{{ route('bookings.edit', $record->id) }}" class="btn btn-outline-primary" style="border: darkgreen 1px solid">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('bookings.destroy', $record->id ) }}">
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
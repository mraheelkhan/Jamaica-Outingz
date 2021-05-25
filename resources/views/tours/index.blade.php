@extends('layouts.main')
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="card-title">
                </div>
                <div class="float-right">
                    <a href="{{ route('tours.create') }}" class="btn btn-block btn-outline-primary border-0">
                        <i class="fas fa-plus fa-xs"></i> Add Tour
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>S No</th>
                            <th>Tour name</th>
                            <th>Location</th>
                            <th>Duration</th>
                            <th>Cost</th>
                            <th>Guide info</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($array as $record)
                            <tr>
                                <td>{{ $loop->index }}</td>
                                <td> {{ $record['tour_name'] }}</td>
                                <td>{{ $record['tour_name'] }}</td>
                                <td>{{ $record['tour_name'] }}</td>
                                <td>{{ $record['tour_name'] }}</td>
                                <td>{{ $record['tour_name'] }}</td>
                                <td>
                                    <a href="#" class="btn btn-outline-primary" style="border: darkgreen 1px solid">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-danger border-0">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </a>
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
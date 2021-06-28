@extends('layouts.main')
@section('page')
    Tours & Excursion
@endsection
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
                            <th>Cover Image</th>
                            <th>Images</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($tours as $record)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $record['tour_name'] }}</td>
                                <td>{{ $record['location'] }}</td>
                                <td>{{ $record['duration'] }}</td>
                                <td>{{ $record['cost'] }}</td>
                                <td>{{ $record['guide_info'] }}</td>
                                <td>
                                    <a title="Click to Download Image!" href="{{ asset('images/tours/'.$record['img']) }}" download>
                                        <img src="{{ asset('images/tours/'.$record['img']) }}" style="width:5rem; margin: auto;">
                                    </a>
                                </td>
                                <td>
                                    <ul>
                                        @foreach($record->images as $img)
                                            <li><a href="{{ asset('images/tours/'.$img->image) }}" download>Image {{ $loop->index+1 }}</a></li>
                                        @endforeach
                                    </ul>
                                </td>
                                
                                <td>
                                    <a href="{{ route('tours.edit', $record->id) }}" class="btn btn-outline-primary" style="border: darkgreen 1px solid">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('tours.destroy', $record->id ) }}">
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
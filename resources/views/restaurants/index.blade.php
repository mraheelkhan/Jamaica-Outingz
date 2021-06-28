@extends('layouts.main')
@section('page')
    Restaurants
@endsection
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="card-title">
                </div>
                <div class="float-right">
                    <a href="{{ route('restaurants.create') }}" class="btn btn-block btn-outline-primary border-0">
                        <i class="fas fa-plus fa-xs"></i> Add Restaurant
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>S No</th>
                            <th>Category</th>
                            <th>Restaurant Name</th>
                            <th>Guide Info</th>
                            <th>Cover Image</th>
                            <th>Images</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($restaurants as $record)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td> {{ $record['category'] }}</td>
                                <td>{{ $record['name'] }}</td>
                                <td>{{ $record['guide_info'] }}</td>
                                <td>
                                    <a title="Click to Download Image!" href="{{ asset('images/restaurants/'.$record['img']) }}" download>
                                        <img src="{{ asset('images/restaurants/'.$record['img']) }}" style="width:5rem; margin: auto;">
                                    </a>
                                </td>
                                <td>
                                    <ul>
                                        @foreach($record->images as $img)
                                            <li><a href="{{ asset('images/restaurants/'.$img->image) }}" download>Image{{ $loop->index+1 }}</a></li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{ route('restaurants.edit', $record->id) }}" class="btn btn-outline-primary" style="border: darkgreen 1px solid">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('restaurants.destroy', $record->id ) }}">
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
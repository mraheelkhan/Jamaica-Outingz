@extends('layouts.main')
@section('page')
    Merchandises
@endsection
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="card-title">
                </div>
                <div class="float-right">
                    <a href="{{ route('merchendises.create') }}" class="btn btn-block btn-outline-primary border-0">
                        <i class="fas fa-plus fa-xs"></i> Add Merchandises
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>S No</th>
                            <th>Category</th>
                            <th>Merchandise Type</th>
                            <th>Cost</th>
                            <th>Brand</th>
                            <th>SKU</th>
                            <th>Color</th>
                            <th>Available Sizes</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($merchendises as $record)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td> {{ $record['category'] }}</td>
                                <td>{{ $record['type'] }}</td>
                                <td>{{ $record['cost'] }}</td>
                                <td>{{ $record['brand'] }}</td>
                                <td>{{ $record['sku'] }}</td>
                                <td>{{ $record['color'] }}</td>
                                <td>{{ $record['available_size'] }}</td>
                               <td>
                                    <a href="{{ route('merchendises.edit', $record->id) }}" class="btn btn-outline-primary" style="border: darkgreen 1px solid">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('merchendises.destroy', $record->id ) }}">
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
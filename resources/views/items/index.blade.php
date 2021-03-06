@extends('layouts.main')
@section('page')
    Items
@endsection
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="card-title">
                </div>
                <div class="float-right">
                    <a href="{{ route('items.create') }}" class="btn btn-block btn-outline-primary border-0">
                        <i class="fas fa-plus fa-xs"></i> Add Item
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>S No</th>
                            <th>Category</th>
                            <th>SKU</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Sizes</th>
                            <th>Colors</th>
                            <th>Materials</th>
                            <th>Fittings</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($array as $record)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td> {{ $record['category_id'] }}</td>
                                <td> {{ $record['sku'] }}</td>
                                <td> {{ $record['title'] }}</td>
                                <td> {{ $record['price'] }}</td>
                                <td> {{ $record['sizes'] }}</td>
                                <td> {{ $record['colors'] }}</td>
                                <td> {{ $record['materials'] }}</td>
                                <td> {{ $record['fittings'] }}</td>
                                <td> {{ $record['description'] }}</td>
                                <td> <img src="{{ asset('images/items/'.$record['image']) }}" style="width: 80%;"></td>
                                <td>
                                    <a href="{{ route('items.edit', $record->id ) }}" class="btn btn-outline-primary float-left" style="border: darkgreen 1px solid">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('items.destroy', $record->id ) }}">
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
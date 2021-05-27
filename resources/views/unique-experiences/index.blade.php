@extends('layouts.main')
@section('page')
    Unique Experience
@endsection
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="card-title">
                </div>
                <div class="float-right">
                    <a href="{{ route('unique-experiences.create') }}" class="btn btn-block btn-outline-primary border-0">
                        <i class="fas fa-plus fa-xs"></i> Add Unique Experience
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>S No</th>
                            <th>Category</th>
                            <th>Unique Experience</th>
                            <th>Guide info</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($unique_experiences as $record)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td> {{ $record['category'] }}</td>
                                <td> {{ $record['unique_experience_name'] }}</td>
                                <td>{{ $record['guide_info'] }}</td>
                                <td>
                                    <a href="{{ route('unique-experiences.edit', $record->id) }}" class="btn btn-outline-primary" style="border: darkgreen 1px solid">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('unique-experiences.destroy', $record->id ) }}">
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
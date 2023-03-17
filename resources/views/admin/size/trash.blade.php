@extends('admin.master')
@section('title', 'Trashed Sizes | ' . env('APP_NAME'))
@section('content')

    <h1>All Trashed Sizes</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($sizes as $size)
                    <td>{{ $size->id }}</td>
                    <td> {{ $size->name }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.sizes.restore', $size->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.sizes.forcedelete', $size->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-times"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

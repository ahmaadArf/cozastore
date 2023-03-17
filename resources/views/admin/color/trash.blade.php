@extends('admin.master')
@section('title', 'Trashed Colors | ' . env('APP_NAME'))
@section('content')

    <h1>All Trashed Colors</h1>
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
                @foreach ($colors as $color)
                    <td>{{ $color->id }}</td>
                    <td> {{ $color->name }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.colors.restore', $color->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.colors.forcedelete', $color->id) }}" method="POST">
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

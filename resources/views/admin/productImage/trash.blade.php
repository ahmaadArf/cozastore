@extends('admin.master')
@section('title', 'Trashed Sliders | ' . env('APP_NAME'))
@section('content')

    <h1>All Trashed Sliders</h1>
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
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($sliders as $slider)
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->name }} </td>
                    <td>{{ $slider->title }} </td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.sliders.restore', $slider->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.sliders.forcedelete', $slider->id) }}" method="POST">
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

@extends('admin.master')
@section('title', 'Product Images | ' . env('APP_NAME'))
@section('content')

    <h1>All Product Image</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($productImages as $productImage)
                    <td>{{ $productImage->id }}</td>
                    <td><img width="80" src="{{ asset('images/productImages/'.$productImage->path) }}" alt=""></td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.productImages.edit', $productImage->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.productImages.destroy', $productImage->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

@extends('admin.master')
@section('title', 'Trashed Products | ' . env('APP_NAME'))
@section('content')

    <h1>All Trashed Products</h1>
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
                <th>Price</th>
                <th>Size</th>
                <th>Color</th>
                <th>Description</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($products as $product)
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }} </td>
                <td>{{ $product->price }} </td>
                <td>
                     @foreach ($product->Sizes  as $size)
                    <span class="bg-dark" style="color: white">{{ $size->name }}</span>
                    @endforeach
                </td>
                <td>
                @foreach ($product->Colors  as $color)
                    <span class="bg-dark" style="color: white">{{ $color->name }}</span>
                @endforeach

                </td>
                <td>{!! $product->description !!} </td>
                <td>{{ $product->Category->name }} </td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.products.restore', $product->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.products.forcedelete', $product->id) }}" method="POST">
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

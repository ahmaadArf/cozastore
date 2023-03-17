@extends('admin.master')
@section('title', 'Add New Image | ' . env('APP_NAME'))
@section('content')

    <h1>Add new Image</h1>
    @include('admin.errors')
    <form action="{{ route('admin.productImages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="path"  class="form-control">
        </div>

        <div class="mb-3">
            <label>Product</label>
            <select name="product_id" class="form-control">
                <option value="">Select</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success px-5">Add</button>
    </form>
@stop



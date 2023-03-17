@extends('admin.master')
@section('title', 'Edit Category | ' . env('APP_NAME'))
@section('content')

    <h1>Edit Category</h1>
    @include('admin.errors')
    <form action="{{ route('admin.categories.update',$category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $category->name }}">
        </div>
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" placeholder="Title" class="form-control" value="{{ $category->title }}">
        </div>

            <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image"  class="form-control">
            <img width="80" src="{{ asset('images/categories/'.$category->image) }}" alt="">

        </div>

        <button class="btn btn-success px-5">Update</button>
    </form>

@stop

@extends('admin.master')
@section('title', 'Edit Color | ' . env('APP_NAME'))
@section('content')

    <h1>Edit Color</h1>
    @include('admin.errors')
    <form action="{{ route('admin.colors.update',$color->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $color->name }}">
        </div>

        <button class="btn btn-success px-5">Update</button>
    </form>

@stop

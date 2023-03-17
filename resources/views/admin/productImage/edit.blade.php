@extends('admin.master')
@section('title', 'Edit Slider | ' . env('APP_NAME'))
@section('content')

    <h1>Edit Slider</h1>
    @include('admin.errors')
    <form action="{{ route('admin.sliders.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{$slider->name }}" placeholder="Name" class="form-control">
        </div>
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{$slider->title }}" placeholder="Title" class="form-control">
        </div>


        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image"  class="form-control">
            <img width="80" src="{{ asset('images/sliders/'.$slider->image) }}" alt="">
        </div>

        <button class="btn btn-success px-5">Update</button>
    </form>

@stop


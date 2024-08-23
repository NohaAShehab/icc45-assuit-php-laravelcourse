@extends('layouts.app')

@section('main')
    <h1> Add New Track </h1>
    <form method="post" action="{{route('tracks.store')}}" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control"
                   value="{{old('name')}}"
                   name="name" aria-describedby="emailHelp">

            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image</label>
            <input type="file" class="form-control"
                   name="image" aria-describedby="emailHelp">
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input type="text"  value="{{old('description')}}"
                   class="form-control" name="description" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>




        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

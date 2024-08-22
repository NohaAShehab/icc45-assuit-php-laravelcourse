@extends('layouts.app')

@section('main')
    <h1> Add New Student </h1>
{{--    @if ($errors->any())--}}
{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}

    <form method="post" action="{{route('students.store')}}" enctype="multipart/form-data">

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
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email"  value="{{old('email')}}"
                   class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Grade</label>
            <input type="number" class="form-control"
                   value="{{old('grade')}}"
                   name="grade" id="exampleInputPassword1">
            @error('grade')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image</label>
            <input type="file" class="form-control"  name="image" aria-describedby="emailHelp">
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Gender</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender"  value="male" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                   Female
                </label>
            </div>
            @error('gender')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tracks</label>
            <select class="form-select" name="track_id" aria-label="Default select example">
                <option selected disabled value="null">Open this select menu</option>
                @foreach($tracks as $track)
                    <option value="{{$track->id}}">{{$track->name}}</option>
                @endforeach

            </select>

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

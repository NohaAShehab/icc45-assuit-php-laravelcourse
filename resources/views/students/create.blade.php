@extends('layouts.app')

@section('main')
    <h1> Add New Student </h1>

    <form method="post" action="{{route('students.store')}}">

        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Grade</label>
            <input type="number" class="form-control"  name="grade" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image</label>
            <input type="text" class="form-control"  name="image" aria-describedby="emailHelp">
        </div>
        <div>
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

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

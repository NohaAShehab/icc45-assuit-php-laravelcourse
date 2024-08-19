@extends('layouts.app')

@section('main')
    <h1> Edit Student </h1>

    <form method="post" action="">

        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" value="{{$student->name}}" name="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control"  value="{{$student->email}}"
                   name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Grade</label>
            <input type="number" class="form-control"
                   value="{{$student->grade}}"
                   name="grade" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image</label>
            <input type="text" class="form-control"  value="{{$student->image}}" name="image" aria-describedby="emailHelp">
        </div>
        <div>
            @if($student->gender==='male')
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender"
                       checked value="male" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender"
                       value="female" id="flexRadioDefault2" >
                <label class="form-check-label" for="flexRadioDefault2">
                   Female
                </label>
            </div>
            @elseif($student->gender==='female')
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender"
                            value="male" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender"
                          checked value="female" id="flexRadioDefault2" >
                    <label class="form-check-label" for="flexRadioDefault2">
                        Female
                    </label>
                </div>
            @else
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender"
                            value="male" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender"
                           value="female" id="flexRadioDefault2" >
                    <label class="form-check-label" for="flexRadioDefault2">
                        Female
                    </label>
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

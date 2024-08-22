@extends('layouts.app')

@section('main')
    <h1> Edit Student </h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form method="post" action="{{route("students.update", $student)}}">

        @csrf
        @method('put')
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
            <input type="file" class="form-control"   name="image" aria-describedby="emailHelp">
            <img src="{{asset('images/students/'.$student->image)}}">
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



        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tracks</label>
            <select class="form-select" name="track_id" aria-label="Default select example">
                @foreach($tracks as $track)
                    @if($track->id=== $student->track_id)
                        <option value="{{$track->id}}" selected>{{$track->name}}</option>
                    @else
                    <option value="{{$track->id}}">{{$track->name}}</option>
                    @endif
                @endforeach

            </select>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

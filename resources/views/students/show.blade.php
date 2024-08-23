@extends("layouts.app")


@section("main")

{{--    @dump($student)--}}

<div class="card" style="width: 18rem;">
    <img src="{{asset('images/students/'.$student->image)}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$student->name}}</h5>
        <p class="card-text">Email: {{$student->email}}</p>
            {{$student->track_id }}
        <p class="card-text">Track: {{$student->track ? $student->track->name : "No track added yet"}}</p>
        <p class="card-text">Student Created by : {{$student->creator ? $student->creator->name : "No creator info "}}</p>

        <p class="card-text">Created_at: {{$student->created_at}}</p>
        <p class="card-text">Updated_at: {{$student->updated_at}}</p>
        {{$student->human_readable_date}}

        <a href="{{route('students.index')}}" class="btn btn-primary">Back to students</a>
    </div>


</div>
<div>
    <h1>My colleagues in this track </h1>
    @if($student->track)
{{--        @dump($student->track->students)--}}
        @foreach($student->track->students as $std)
        @if($student->id != $std->id)
            <li ><a href="{{route('students.show',$std)}}"> {{$std->name}} </a></li>
            @endif
        @endforeach
    @endif
</div>

@endsection

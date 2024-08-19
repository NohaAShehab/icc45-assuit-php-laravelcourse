@extends('layouts.app')

@section('title')
    Students
@endsection



@section("main")
    <h1> All students</h1>
    <a href="" class="btn btn-primary">Add new Student </a>

<table class='table'>
                <tr> <th>ID</th> <th>Name</th> <th>Email</th> <th>  Image</th>
                <td> Show </td>
        </tr>

              @foreach($students as $student)
                <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                          <td> <img src='{{asset("images/students/".$student->image)}}' width="100" height="100"></td>
                        <td><a href="{{route('students.show', $student->id)}}" class='btn btn-info'> Show </a> </td>

                </tr>

              @endforeach

</table>

@endsection



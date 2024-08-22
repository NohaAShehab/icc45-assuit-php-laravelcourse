@extends('layouts.app')

@section('title')
    tracks
@endsection



@section("main")
    <h1> All tracks</h1>
    <a href="{{route('tracks.create')}}" class="btn btn-primary">Add new track </a>

<table class='table'>
                <tr> <th>ID</th> <th>Name</th>
                <td> Show </td> <td> Edit</td> <td> Delete</td>
        </tr>

              @foreach($tracks as $track)
                <tr>
                        <td>{{$track->id}}</td>
                        <td>{{$track->name}}</td>

                        <td><a href="{{route('tracks.show', $track->id)}}" class='btn btn-info'> Show </a> </td>
                    <td> <a href="{{route("tracks.edit",$track->id)}}" class="btn btn-warning">Edit</a></td>
                    <td>
                        <form action="{{route('tracks.destroy', $track)}}"  method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>

                    </td>
                </tr>

              @endforeach

</table>

@endsection



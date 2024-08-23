@extends("layouts.app")


@section("main")


<div class="card" style="width: 18rem;">
    <img src="{{asset('images/tracks/'.$track->image)}}" class="card-img-top" alt="...">
{{--    <img src="{{storage_path("public/storage".$track->image)}}" class="card-img-top" alt="...">--}}

    <div class="card-body">
        <h5 class="card-title">{{$track->name}}</h5>

        <p class="card-text">Created_at: {{$track->created_at}}</p>
        <p class="card-text">Updated_at: {{$track->updated_at}}</p>
        {{$track->human_readable_date}}

        <a href="{{route('tracks.index')}}" class="btn btn-primary">Back to tracks</a>
    </div>


</div>

@endsection

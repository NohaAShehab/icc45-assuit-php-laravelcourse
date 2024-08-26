@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
{{--                    @dump(Auth::user())--}}
                        @if(Auth::user()->image)
                            <img src="{{Auth::user()->image}}">
                            <img src="{{asset("images/users/".Auth::user()->image)}}" width="300" height="300">
                        @endif
                   <p> {{ __('You are logged in!') }} </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

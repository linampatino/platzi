@extends('layouts.app')

@section('content')

    <h1>{{ $user->name }}</h1>
    <a class="btn btn-link" href="/users/{{$user->username}}/follows">Following <span class="badge badge-default">{{ $user->follows->count() }}</span></a>
    <a class="btn btn-link" href="/users/{{$user->username}}/followers">Followers <span class="badge badge-default">{{ $user->followers->count() }}</span></a>

    @if(Auth::check())

        @if(Gate::allows('dms', $user))
            <form action="/users/{{$user->username}}/dms" method="post">
                {{ csrf_field() }}
                <input type="text" name="message" class="form-control">
                <button type="submit" class="btn btn-success">Send DM</button>
            </form>
        @endif

        @if(Auth::user()->isFollowing($user))
        <form action="/users/{{$user->username}}/unfollow" method="post">
                {{ csrf_field() }}
                @if(session('success'))
                    <span class="text-success">{{ session('success')}}</span>
                @endif

                <button class="btn btn-danger">Unfollow</button>
            </form>
        @else
            <form action="/users/{{$user->username}}/follow" method="post">
                {{ csrf_field() }}
                @if(session('success'))
                    <span class="text-success">{{ session('success')}}</span>
                @endif

                <button class="btn btn-primary">Follow</button>
            </form>
        @endif
    @endif

    <div class="row">
        @foreach($user->messages as $message)
            <div class="col-6"> 
                @include('messages.message')
            </div>
        @endforeach
    </div>
    

@endsection
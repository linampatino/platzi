@extends('layouts.app')

@section('content')

<div class="jumbotrop text-center">
    <h1>Messages!!</h1>
    <nav >
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
        </ul>
    </nav>
</div>

<div class="row">
    @forelse($messages as $message)
        <div class="col-6">
            <img class=img-thumbnail"" src="{{$message->image}}" alt="">
            <p class="card-text">{{$message->content}}
                <a href="/messages/{{$message->id}}">Read more...</a>
            </p>
        </div>
    @empty
        <p>Not exists messages</p>
    @endforelse
</div>

@endsection
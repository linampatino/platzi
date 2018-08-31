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

<div class = "row">
    <form action="/messages/create" method="post" enctype="multipart/form-data">
        <div class="form-group @if($errors->has('message')) is-invalid @endif">
            {{ csrf_field() }}
            <input type="text" name="message" class="form-control" placeholder="What are you thinking..">
            @if($errors->any())
                @foreach($errors->get('message') as $error)
                    <div>{{ $error }}</div>
                @endforeach
            @endif
            <input type="file" class="form-control-file" name="image">
        </div>
    </form>
</div>

<div class="row">
    @forelse($messages as $message)
        <div class="col-6">
            @include('messages.message')
        </div>
    @empty
        <p>Not exists messages</p>
    @endforelse

    @if(count($messages))
        <div class="mt-2 mx-auto">
            {{ $messages->links() }}
        </div>
        
    @endif

</div>

@endsection
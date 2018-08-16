@extends('layouts.app')

@section('content')
    <div>
        <h1>{{ $user->username }}</h1>
        <ul class="list-unstyled">
            @foreach($follows as $follow)
                <li>echo {{ $follow->username }}</li>
            @endforeach
        </ul>

    </div>
@endsection
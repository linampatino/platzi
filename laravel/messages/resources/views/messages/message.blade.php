<img class=img-thumbnail"" src="{{$message->image}}" alt="">
    <p class="card-text">
    <span class="text-muted">Written by <a href="/{{ $message->user->username }}"> {{ $message->user->username }} </a> </span>
    {{$message->content}}
        <a href="/messages/{{$message->id}}">Read more...</a>
    </p>
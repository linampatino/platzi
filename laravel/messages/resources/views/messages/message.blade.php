<img class=img-thumbnail"" src="{{$message->image}}" alt="">
    <p class="card-text">
    <span class="text-muted">Written by <a href="/users/{{ $message->user->username }}"> {{ $message->user->username }} </a> </span>
    {{$message->content}}
        <a href="/messages/{{$message->id}}">Read more...</a>
    </p>

    <div class="card-text text-muted float-right">
        {{ $message->created_at }}
    </div>
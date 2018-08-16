@extends('layouts.app')

@section('content')
    <form action="/auth/facebook/register" method="post">
        {{ csrf_field() }}

        <div class="card">
            <div class="card-block">
                <img class="img-thumbnail" src="{{ $user->avatar }}" alt="">
            </div>

            <div class="card-block">
                <div class="form-group">
                    <label for="name" class="form-control-label">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" readonly>
                </div>

                <div class="form-group">
                    <label for="email" class="form-control-label">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}" readonly>
                </div>

                <div class="form-group">
                    <label for="username" class="form-control-label">Username:</label>
                    <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Register</button>
            </div>



        </div>

    </form>
@endsection
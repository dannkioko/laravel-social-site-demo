@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($user->messages as $message)
    <div class="row pt-2 pb-4">
        <div class="col-6 offset-3">
            <div>
                <p><span><a href="/profile/{{$user->id}}" class="text-dark"><span class="font-weight-bold">{{$message->user->username}}</span></a></span>  {{$message->message}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
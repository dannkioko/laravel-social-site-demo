@extends('layouts.app')

@section('content')
<div class="container">
	<form action="/message/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Messages</h1>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label">Conversation With:{{$user->username}}</label>
                </div>
                @foreach($user->messages as $message)
                <div class="row pt-2">
                    <div class="col-6 offset-3">
                        <div>
                            <p><span><a href="/profile/{{$user->id}}" class="text-dark"><span class="font-weight-bold">{{$message->profile->user->username}}</span></a></span>  {{$message->message}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="form-group row">
                    <label for="message" class="col-md-4 col-form-label">Message</label>

                    <input id="message" name="message" type="text" class="form-control @error('message') is-invalid @enderror" value="{{ old('message')??$user->profile->message }}" autocomplete="message" autofocus>

                </div>
                <div class="row pt-4">
                    <button type="submit" class="btn btn-primary">Send Message</button>                  
                </div>
            </div> 
        </div>
    </form>
</div>
@endsection
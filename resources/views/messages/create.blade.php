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
                <div class="chat-page">
                    <div class="msg-inbox">
                        <div class="chats">
                            <div class="msg-page">
                                @foreach($messages as $message)
                                @if($message->user_id->id==$user->id)
                                <div class="received-chats">
                                    <div class="received-chats-img">
                                        <img src="">
                                    </div>
                                    <div class="received-msg">
                                        <div class="received-msg-inbox">
                                            <p>{{$message->message}}</p>
                                            <span>{{$message->created_at}}</span>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="outgoing-chats">

                                    <div class="outgoing-chats-msg">
                                        <p>{{$message->message}}</p>
                                        <span>{{$message->created_at}}</span>
                                    </div>
                                    <div class="outgoing-chats-img">
                                        <img src="">
                                    </div>
                                </div>
                                @endif                    
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <input id="message" name="message" type="text" class="form-control  @error('message') is-invalid @enderror" autocomplete="message" autofocus>
                        <div>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" class="w-100">
        </div>
        <div class="col-4">
        	<div>
        	<div class="d-flex align-items-center">
        		<div class="pr-3">
        			<img src="/storage/{{$post->user->profile->image}}" class="rounded-circle w-100" style="max-width: 50px">
        		</div>
        		<div>
        			<a href="/profile/{{$post->user->id}}" class="text-dark"><span>{{$post->user->username}}</span></a>
        			<a href="#" class="pl-3">Follow</a>
        		</div>
        	</div>
        	<hr>
        	<p><span><a href="/profile/{{$post->user->id}}" class="text-dark"><span>{{$post->user->username}}</span></a></span>{{$post->caption}}</p>
        </div>
        </div>
    </div>
</div>
@endsection

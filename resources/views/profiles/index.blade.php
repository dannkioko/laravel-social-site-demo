@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 pt-5">
            <img src="/storage/{{$user->profile->image}}" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3"><div class="h4">{{ $user->username }}</div>
                <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
            </div>
                @can('update',$user->profile)
                <a href="/post/create">Add New Post</a>
                @endcan
            </div>
            @can('update', $user->profile)
            <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div><strong>{{$user->posts->count()}}</strong> posts</div>
                <div class="pl-5"><strong>{{$user->profile->followers->count()}}</strong> followers</div>
                <div class="pl-5"><strong>{{$user->following->count()}}</strong> following</div>
            </div>
            <div class="pt-4 font-weight=bold">{{ $user->profile->title }}</div>
            <div class="pt-2">{{ $user->profile->description }}</div>
            <div class="pt-2"><a href="#">{{$user->profile->url??'N/A'}}</a></div>
            <div class="d-flex">
                @cannot('update',$user->profile)
                <div class="mr-2">
                <form action="/message/{{$user->id}}" enctype="multipart/form-data" method="get">
                    <button type="submit" class="btn btn-primary mt-4">Send Message</button>
                </form>
            </div>
            @endcannot
            </div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4">
            <a href="/post/{{$post->id}}"><img src="/storage/{{$post->image}}" class="w-100"></a>
        </div>
        @endforeach
    </div>
</div>
@endsection

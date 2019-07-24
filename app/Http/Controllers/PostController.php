<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        //instead of orderBy, latest() method can also be used
        $posts = Post::whereIn('user_id', $users)->with('user')->orderBy('created_at','DESC')->paginate(10);
        return view('posts.index',compact('posts'));
    }

    public function create()
    {
    	return view('posts.create');
    }
    public function store()
    {
    	$data = request()->validate([
    		'caption'=>'required',
    		'image'=>['required','image'],]);
        $imgPath = request('image')->store('uploads','public');

        auth()->user()->posts()->create(['caption'=>$data['caption'],'image'=>$imgPath]);

    	return redirect('/profile/' .auth()->user()->id );
    }
    public function show(\App\Post $post)
    {
        return view('posts.show', compact('post'));
    }
}

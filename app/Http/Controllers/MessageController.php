<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;

class MessageController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index(User $user){
        $users = [auth()->user()->id];
        $messages = Message::whereIn('user_id', $users)->orderBy('created_at','DESC');
        return view('messages.show',compact('messages','user'));
    }
    public function create(User $user)
    {
    	return view('messages.create', compact('user'));
    }
    public function store(User $user){
    	$data = request()->validate([
    		'message'=>'',
    		'user_id'=>'',
    		'profile_id'=>''
    	]);
    	auth()->user()->messages()->create(['message'=>$data['message'],'user_id'=>auth()->user()->id,'profile_id'=>$user->id]);
    }
}

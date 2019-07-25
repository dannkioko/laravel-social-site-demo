<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index(User $user){
        $messages = DB::table('messages')->where([['user_id',auth()->user()->id],['profile_id',$user->id],])->orWhere([['user_id',$user->id],['profile_id',auth()->user()->id],])->get();
        foreach ($messages as $message) {
            $message->user_id=User::find($message->user_id);
        }
        return view('messages.create',compact('messages','user'));
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
        return redirect('/message/' .$user->id );
    }
}

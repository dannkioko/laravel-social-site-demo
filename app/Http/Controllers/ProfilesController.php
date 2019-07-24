<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class ProfilesController extends Controller
{
    // 
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        //dd($follows);
        return view('profiles.index', compact('user','follows'));
        
    }
    public function edit(User $user)
    {
    	$this->authorize('update', $user->profile);

    	return view('profiles.edit', compact('user'));
    }
    public function update(User $user)
    {
    	$this->authorize('update', $user->profile);
    	$data = request()->validate([
    		'title'=>'required',
    		'description'=>'required',
    		'url'=>'url',
    		'img'=>'',]);
    	if(request('image'))
    	{
    		$imgPath = request('image')->store('uploads','public');
            $imgArray =['image'=>$imgPath];
    	}
    	auth()->user()->profile->update(array_merge($data, $imgArray ?? []));
    	return redirect("/profile/{$user->id}"); 
    }
}

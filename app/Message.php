<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $guarded =[];
    public function user()
    {
    	return $this->belongsto(User::class, 'user_id');
    }
    public function profile()
    {
    	return $this->belongsTo(Profile::class, 'profile_id');
    }
}

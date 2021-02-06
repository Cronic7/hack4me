<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Report extends Model
{  
	  use Notifiable;
    protected $fillable=['message','sender_hacker_user_id','receiver_business_user_id','file','account'];

     public function user()
       {
       	  return $this->belongsTo(User::class,'sender_hacker_user_id');
       }
}

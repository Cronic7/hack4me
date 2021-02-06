<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHacker extends Model
{
    protected $fillable=['address','username','user_id'];

         public function user()
             {
             	return $this->belongsTo(User::class);
             }

           public function rating()
          {
          	 return $this->hasMany(Rating::class);
          }

}

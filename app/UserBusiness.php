<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBusiness extends Model
{
      protected $fillable=['username','company_name','telephone','user_id','address'];


        public function user()
             {
             	return $this->belongsTo(User::class,'user_id');
             }

          public function rating()
          {
          	 return $this->hasMany(Rating::class);
          }
}

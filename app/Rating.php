<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable=['user_hacker_id','user_business_id','rate','message','report_id','is_seen'];

   public function userhacker()
          {
          	 return $this->belongsTo(UserHacker::class,'user_hacker_id');
          }
  
   public function userbusiness()
          {
          	 return $this->belongsTo(UserBusiness::class,'user_business_id');
          }
}

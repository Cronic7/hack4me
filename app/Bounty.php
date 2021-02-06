<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Bounty extends Model
{

	  protected $fillable=['title','image','deadline','description','reward','bounty_category_id','user_id','status','file','url'];
       public function category()
          {
          	return $this->belongsTo(BountyCategory::class,'bounty_category_id');
          }

          public function user()
           {
           	 return $this->belongsTo(User::class,'user_id');
           }

      public function getDeadlineAttribute($data)
        {
         return $data;
        }

        
}
	
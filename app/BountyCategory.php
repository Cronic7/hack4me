<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BountyCategory extends Model
{
     protected  $fillable=['name'];



     public function bounty()
        {
        	return $this->hasMany(Bounty::class);
        }


  
}

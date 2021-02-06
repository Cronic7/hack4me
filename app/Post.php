<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

	   use SoftDeletes;
	   
	       protected $fillable=['title','image','description','content','status','category_id','user_id','published_at'];


	       public function category()
	         {
	         	return $this->belongsTo(Category::class);
	         }
             
             public function user()
             {
             	return $this->belongsTo(User::class);
             }

                public function scopeSearched($query)
                  {
                        $search= request()->query('search');

                        if(!$search)
                        {
                           return $query;
                        }


                      return $query->where('title','LIKE',"%{$search}%");
                  }

           
}

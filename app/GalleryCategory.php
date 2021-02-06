<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $fillable=['name','cover_image','slug'];

    public function images()
      {
      	return $this->hasMany(GalleryImage::class);
      }


      
}

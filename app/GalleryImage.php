<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
      protected $fillable=['image','gallery_category_id','slug'];
      
      public function gallery()
       {
          return  $this->belongsTo(GalleryCategory::class,'gallery_category_id');
       }
}

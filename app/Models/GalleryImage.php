<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $table = 'gallary_images';
    protected $fillable = ['tag', 'image', 'title', 'description'];

}

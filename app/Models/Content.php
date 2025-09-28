<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';
    protected $fillable = ['title', 'content', 'slug'];

    public function content_images()
    {
        return $this->hasMany(ContentImage::class, 'content_id');
    }

}

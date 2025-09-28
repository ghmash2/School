<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentImage extends Model
{
    protected $table = 'content_images';
    protected $fillable = ['content_id', 'image'];

    public function content()
    {
        return $this->belongsTo(Content::class, 'content_id');
    }

}

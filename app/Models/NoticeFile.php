<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoticeFile extends Model
{
    protected $table = 'notice_files';
    protected $fillable = ['notice_id', 'file'];

    public function notice()
    {
        return $this->belongsTo(Notice::class, 'notice_id');
    }
}

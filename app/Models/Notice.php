<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'notices';
    protected $fillable = ['section', 'title', 'tag', 'published_date', 'published_by', 'description', 'slug'];

    public function notice_files()
    {
        return $this->hasMany(NoticeFile::class, 'notice_id');
    }
}

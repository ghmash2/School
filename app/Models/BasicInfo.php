<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasicInfo extends Model
{
    protected $table = 'basic_infos';
   protected $fillable = [
        'name',
        'logo',
        'motto',
        'address',
        'email',
        'eiin',
        'phone',
        'office_time',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'google_map',
    ];
}

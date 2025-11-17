<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class userhassotk extends Model
{
    use SoftDeletes;
    
    // protected $connection = 'DB_core';
    protected $table = "user_has_strukturorganisasi";
    protected $fillable = [
        'id',
        'user_id',
        'strukturorganisasi_id',
    ];
}

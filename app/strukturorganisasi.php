<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class strukturorganisasi extends Model
{
    use SoftDeletes;
    
    // protected $connection = 'DB_core';
    protected $table = "struktur_organisasi";
    protected $fillable = [
        'head',
        'parent',
        'child',
        'kode',
        'jabatan',
    ];
}

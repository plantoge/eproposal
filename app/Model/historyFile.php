<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class historyFile extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'HISTORY_ID';

    protected $table = "history_file";
    protected $fillable = [
        'HISTORY_ID',
        'HISTORY_PROPOSAL_ID',
        'HISTORY_FILE',
        'HISTORY_KETERANGAN',
        'HISTORY_USER_ID',
    ];

    protected static function boot()
    {
        parent::boot();

        // Membuat UUID secara otomatis sebelum menyimpan model
        static::creating(function ($model) {
            $model->HISTORY_ID = Uuid::uuid4()->toString();
        });
    }
}

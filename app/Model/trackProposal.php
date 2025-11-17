<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class trackProposal extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'TRACK_ID';

    protected $table = "trace_track_proposal";
    protected $fillable = [
        'TRACK_ID',
        'TRACK_PROPOSAL_ID',
        'TRACK_TAHAPAN',
        'TRACK_STATUS',
        'TRACK_KETERANGAN',
        'TRACK_USER_ID',
    ];

    protected static function boot()
    {
        parent::boot();

        // Membuat UUID secara otomatis sebelum menyimpan model
        static::creating(function ($model) {
            $model->TRACK_ID = Uuid::uuid4()->toString();
        });
    }
}

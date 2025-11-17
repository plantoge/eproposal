<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class proposal extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'PROPOSAL_ID';

    // protected $connection = 'DB_core';
    protected $table = "proposal";
    protected $fillable = [
        'PROPOSAL_ID',
        'PROPOSAL_NOMOR',
        'PROPOSAL_KODE',
        'PROPOSAL_PENELITI_UTAMA',
        'PROPOSAL_TIM_PENELITI',
        'PROPOSAL_JUDUL_PENELITIAN',
        'PROPOSAL_SURAT_PENGANTAR',
        'PROPOSAL_PROPOSAL_PENELITIAN',
        'PROPOSAL_KAJI_ETIK',
        'PROPOSAL_KAJI_ETIK_RSPI',
        'PROPOSAL_SERTIFIKAT_GCP',
        'PROPOSAL_LAPORAN_PENELITIAN',
        'PROPOSAL_RAW_DATA_PENELITIAN',
        'PROPOSAL_INSTITUSI_ASAL',
        'PROPOSAL_EMAIL',
        'PROPOSAL_PHONE',
        'PROPOSAL_TAHAPAN',
        'PROPOSAL_STATUS',
        'PROPOSAL_SURAT_TANGGAPAN',
        'PROPOSAL_SURAT_PENOLAKAN',
        'PROPOSAL_PKS',
        'PROPOSAL_MTA',
        'PROPOSAL_KERAHASIAAN',
        'PROPOSAL_BUKTI_BAYAR',
        'PROPOSAL_IZIN_PENELITIAN',
        'PROPOSAL_IZIN_PENELITIAN_DRAFT',
    ];

    protected static function boot()
    {
        parent::boot();

        // Membuat UUID secara otomatis sebelum menyimpan model
        static::creating(function ($model) {
            $model->PROPOSAL_ID = Uuid::uuid4()->toString();
        });
    }
}

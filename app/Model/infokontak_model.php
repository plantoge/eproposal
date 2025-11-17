<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class infokontak_model extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'INFO_ID';

    // protected $connection = 'DB_core';
    protected $table = "informasi_kontak";
    protected $fillable = [
        'INFO_ID',
        'SAMBUTAN_BERANDA',
        'DESKRIPSI_AGENDA',
        'DESKRIPSI_TENTANGKAMI',
        'DESKRIPSI_SINGKAT_POINTPLUS',
        'DESKRIPSI_SINGKAT_EVENT_BERANDA',
        'DESKRIPSI_SINGKAT_EVENT',
        'DESKRIPSI_SINGKAT_TESTIMONY',
        'DESKRIPSI_SINGKAT_AGENDA',
        'DESKRIPSI_SINGKAT_BERITA',
        'DESKRIPSI_BIAYA',
        'TELEPON',
        'FAX',
        'CALLCENTER',
        'HOTLINE',
        'EMAIL',
        'FACEBOOK',
        'INSTAGRAM',
        'TWITTER',
        'WHATSAPP',
        'CP_KAJI_ETIK',
        'WA_KAJI_ETIK',
        'CP_PKS',
        'WA_PKS',
        'CP_MTA',
        'WA_MTA',
        'CP_KERAHASIAAN',
        'WA_KERAHASIAAN',
        'PEMILIK_REKENING',
        'NOMOR_REKENING',
        'NAMA_BANK',
        'LOGO_BANK',
    ];

    protected static function boot()
    {
        parent::boot();

        // Membuat UUID secara otomatis sebelum menyimpan model
        static::creating(function ($model) {
            $model->INFO_ID = Uuid::uuid4()->toString();
        });
    }
}

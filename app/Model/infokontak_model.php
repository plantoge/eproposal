<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class infokontak_model extends Model
{
    use SoftDeletes;
    public $timestamps = true; // untuk membuat field created_at dan updated_at
    public $incrementing = true; // untuk membuat primary key tidak auto increment

    protected $table = 'public.informasi_kontak'; // nama schema serta table
    protected $primaryKey = 'id'; // primary key dari table
    protected $keyType = 'string'; // tipe data primary key
    protected $hidden = []; // field yang di hidden
    protected $guarded = []; // field yang tidak boleh di get
    // protected $fillable = ['nama']; // field yang boleh di get
    // protected $connection = 'mysql'; // koneksi database
    
    protected static function boot()
    {
        parent::boot();

        // Membuat UUID secara otomatis sebelum menyimpan model
        static::creating(function ($model) {
            if (! $model->getKey()) {
                $model->{$model->getKeyName()} = Uuid::uuid7()->toString();
            }
        });

        static::creating(function ($model) {
            if (Auth::check()) {
                $model->created_by = Auth::id();
                $model->updated_by = Auth::id(); // isi sekalian saat create
            }
        });

        static::updating(function ($model) {
            if (Auth::check()) {
                $model->updated_by = Auth::id();
            }
        });

        static::deleting(function ($model) {
            if (Auth::check()) {
                $model->updated_by = Auth::id();
                $model->save();
            }
        });
    }

    // relasi
    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\Models\User', 'updated_by', 'id');
    }

}

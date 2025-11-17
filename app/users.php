<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class users extends Model
{
    protected $table = "users";
    public $incrementing = false; //laravel mencoba menggunakan increment nilai bulat, sedangkan saya pasang uuid. makanya hasil nol klw tidak pakai ini
    protected $keyType = 'string';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'status_user',
        'nip',
        'name',
        'username',
        'password',
        'email',
        'phone',
        'institusi_asal',
        'jk',
        'g2fa',
    ];

    protected static function boot()
    {
        parent::boot();

        // Membuat UUID secara otomatis sebelum menyimpan model
        static::creating(function ($model) {
            $model->id = Uuid::uuid4()->toString();
        });
    }
}

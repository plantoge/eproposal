<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Ramsey\Uuid\Uuid;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;
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
        'kategori_pendidikan',
        'forgot_password_token',
        'forgot_password_at',
    ];

    protected $hidden = [
        'password', 'remember_token', 'g2fa'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
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

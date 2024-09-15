<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'id_level',
        'nama_lengkap',
        'password',
    ];
    public function jurusans()
    {
        return $this->hasManyThrough(
            Jurusan::class,        // Model tujuan (Jurusan)
            UserJurusan::class,    // Model perantara (UserJurusan)
            'id_level',            // Foreign key pada UserJurusan yang mereferensi tabel levels
            'id',                  // Foreign key pada Jurusan yang mereferensi UserJurusan
            'id_level',            // Local key pada users
            'id_jurusan'           // Foreign key pada UserJurusan yang mereferensi tabel jurusan
        );
    }
    public function level()
    {
        return $this->belongsTo(Roles::class, 'id_level');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}

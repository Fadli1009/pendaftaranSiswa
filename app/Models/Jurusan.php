<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jurusan extends Model
{
    use HasFactory, SoftDeletes;
    protected  $fillable = ['nama_jurusan'];
    protected $table = 'jurusan';
    public function peserta()
    {
        return $this->hasOne(Peserta::class, 'id_jurusan', 'id')->onDelete('restrict');
    }
    public function user()
    {
        return $this->hasMany(UserJurusan::class, 'id_jurusan', 'id')->onDelete('restrict');
    }
}

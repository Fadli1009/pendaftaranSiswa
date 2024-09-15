<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJurusan extends Model
{
    use HasFactory;
    protected $fillable = ['id_jurusan', 'id_level', 'id_user'];
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id');
    }

    public function level()
    {
        return $this->belongsTo(Roles::class, 'id_level', 'id');
    }
}

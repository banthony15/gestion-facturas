<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfiles';

    protected $fillable = ['descripcion'];

    public function perfiles()
    {
        return $this->hasMany(User::class, 'perfil_id');
    }
}

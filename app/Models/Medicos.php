<?php

namespace App\Models;

use App\Models\Protesis\Entrantes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medicos extends Model
{
    use HasFactory;

    protected $table = 'medicos';
    protected $fillable = [
        'nombre',
        'apellido',
        'especialidad',
        'matricula',
        'tipo'
    ];

    public function EntrantesProtesis(): HasMany
    {
        return $this->hasMany(Entrantes::class);
    }
}

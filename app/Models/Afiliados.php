<?php

namespace App\Models;

use App\Models\Protesis\Entrantes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Afiliados extends Model
{
    use HasFactory;

    protected $table = 'afiliados';

    protected $fillable = ['identificador_afiliado','nombre','apellido','documento','telefono','sexo','email','provincia','localidad','obras_sociales_id'];


    public function ObrasSociales(): BelongsTo
    {
        return $this->belongsTo(ObraSocial::class);
    }

    public function EntrantesProtesis(): HasMany
    {
        return $this->hasMany(Entrantes::class);
    }
}

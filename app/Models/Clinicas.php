<?php

namespace App\Models;

use App\Models\Protesis\Entrantes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Clinicas extends Model
{
    use HasFactory;

    protected $table = 'clinicas';
    protected $fillable = ['nombre', 'jurisdiccion', 'direccion', 'telefono'];

    public function EntrantesProtesis(): HasMany
    {
        return $this->hasMany(Entrantes::class);
    }
}

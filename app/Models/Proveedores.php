<?php

namespace App\Models;

use App\Models\Protesis\Cotizaciones;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;
    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'direccion',
        'pais',
        'provincia',
        'localidad',
        'condicion_fiscal',
        'cuil_cuit'
    ];

    public function cotizaciones(){
        return $this->hasMany(Cotizaciones::class);
    }
}

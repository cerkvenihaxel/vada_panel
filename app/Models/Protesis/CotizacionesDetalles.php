<?php

namespace App\Models\Protesis;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionesDetalles extends Model
{
    use HasFactory;

    protected $table = 'cotizaciones_detalles';
    protected $fillable = [
        'cotizacion_id',
        'articles_id',
        'garantia',
        'precio_unitario',
        'cantidad',
        'subtotal',
        'procedencia',
        'marca'
    ];

    public function articles()
    {
        return $this->belongsTo(Article::class);
    }
}

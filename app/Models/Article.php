<?php

namespace App\Models;

use App\Models\Protesis\CotizacionesDetalles;
use App\Models\Protesis\EntrantesDetalles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';
    protected $fillable = ['des_articulo','codigo_articulo','marca','stock','precio_venta','precio_compra', 'patologia_id'];


    public function patologia(): BelongsTo
    {
        return $this->belongsTo(Patologia::class);
    }

    public function detalles(): HasMany
    {
        return $this->hasMany(EntrantesDetalles::class, 'article_id');
    }

    public function detalles_cotizacion(): HasMany
    {
        return $this->hasMany(CotizacionesDetalles::class, 'article_id');
    }

}

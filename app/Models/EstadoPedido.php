<?php

namespace App\Models;

use App\Models\Protesis\Entrantes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstadoPedido extends Model
{
    use HasFactory;
    protected $table = 'estado_pedidos';
    protected $fillable = ['estado'];

    public function EntrantesProtesis(): HasMany
    {
        return $this->hasMany(Entrantes::class);
    }

}

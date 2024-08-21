<?php

namespace App\Models\Protesis;

use App\Filament\Resources\Protesis\CotizacionesResource;
use App\Models\EstadoPaciente;
use App\Models\EstadoPedido;
use App\Models\EstadoSolicitud;
use App\Models\Proveedores;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizaciones extends Model
{
    use HasFactory;

    protected $table = 'cotizaciones';
    protected $fillable = [
        'entrantes_id',
        'nro_solicitud',
        'fecha_limite',
        'observaciones',
        'estado_solicitud_id',
        'estado_pedido_id',
        'file_1',
        'file_2',
        'file_3',
        'file_4',
        'proveedores_id',
    ];

    public function proveedores()
    {
        return $this->belongsTo(Proveedores::class);
    }

    public function estado_solicitud(){
        return $this->belongsTo(EstadoSolicitud::class);
    }

    public function estado_pedido(){
        return $this->belongsTo(EstadoPedido::class);
    }

    public function detalles_cotizacion(){
        return $this->hasMany(CotizacionesDetalles::class);
    }
}

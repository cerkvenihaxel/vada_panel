<?php

namespace App\Models\Protesis;

use App\Models\Afiliados;
use App\Models\Clinicas;
use App\Models\EstadoPaciente;
use App\Models\EstadoSolicitud;
use App\Models\Medicos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrantes extends Model
{
    use HasFactory;

    protected $table = "entrantes";
    protected $fillable = [
        'afiliados_id',
        'clinicas_id',
        'estado_pacientes_id',
        'estado_solicitud_id',
        'fecha_cirugia',
        'medicos_id',
        'nro_solicitud',
        'observaciones',
        'file_1',
        'file_2',
        'file_3',
        'file_4',
        'user_stamps'
    ];

    public function afiliados(){
        return $this->belongsTo(Afiliados::class);
    }

    public function clinicas(){
        return $this->belongsTo(Clinicas::class);
    }

    public function medicos(){
        return $this->belongsTo(Medicos::class);
    }

    public function estado_solicitud(){
        return $this->belongsTo(EstadoSolicitud::class);
    }

   public function estado_pacientes(){
        return $this->belongsTo(EstadoPaciente::class);
   }

   public function detalles(){
        return $this->hasMany(EntrantesDetalles::class);
   }

}

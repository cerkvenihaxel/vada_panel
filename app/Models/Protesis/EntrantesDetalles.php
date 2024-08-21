<?php

namespace App\Models\Protesis;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntrantesDetalles extends Model
{
    use HasFactory;
    protected $table = "entrantes_detalles";
    protected $fillable = ['entrantes_id', 'articles_id', 'cantidad'];

    public function entrante()
    {
        return $this->belongsTo(Entrantes::class, 'entrantes_id');
    }

    public function articles()
    {
        return $this->belongsTo(Article::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patologia extends Model
{
    use HasFactory;

    public $table = 'patologias';
    protected $fillable = ['nombre'];

    public function articulos(): HasMany
    {
        return $this->hasMany(Article::class);
    }

}

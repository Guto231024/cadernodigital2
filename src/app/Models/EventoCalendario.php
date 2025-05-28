<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoCalendario extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'tipo', 'data', 'data_fim', 'curso_id'];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}


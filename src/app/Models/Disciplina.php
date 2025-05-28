<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{   
    
    protected $table = 'diciplinas';
    protected $fillable = ['nome', 'curso_id', 'professor_id', 'aluno_id'];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}

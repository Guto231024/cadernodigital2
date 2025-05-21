<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $guarded = ['id'];

    public function aluno()
    {
        return $this->hasMany(Aluno::class, 'curso_id');
    }
}

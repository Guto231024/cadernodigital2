<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Curso;

class Aluno extends Model
{
    protected $table = 'alunos';
    protected $guarded = ['id'];

    public function curso()
{
    return $this->belongsTo(Curso::class);
}
}

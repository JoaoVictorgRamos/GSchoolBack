<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'data_vencimento', 'status'];

    // Defina as relações, se necessário
    public function subtarefas()
    {
        return $this->hasMany(Subtarefa::class);
    }
}

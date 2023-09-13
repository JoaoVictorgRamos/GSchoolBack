<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtarefa extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'id_tarefa', 'descricao', 'status'];
    public function tarefa()
    {
        return $this->belongsTo(Tarefa::class, 'id_tarefa');
    }
}

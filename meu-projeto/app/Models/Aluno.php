<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Aluno extends Model
{
    protected $table = 'alunos';
    protected $fillable = ['nome', 'cpf', 'email', 'telefone'];

    public function roles(){
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}

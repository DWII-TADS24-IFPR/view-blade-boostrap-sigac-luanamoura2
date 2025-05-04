<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pessoa;

class Perfil extends Model
{
    protected $table = 'perfils';
    protected $fillable = ['bio', 'pessoas_id'];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class);
    }
}


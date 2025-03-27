<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory as FactoriesHasFactory;
use Iççuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    use FactoriesHasFactory;

    protected $fillable = ['user_id', 'nome', 'descricao', 'data_inicio', 'data_termino', 'status'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}

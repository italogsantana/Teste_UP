<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artigos extends Model
{
    protected $fillable = [
        'id_veiculo',
        'id_usuario',
        'nome_veiculo',
        'img_veiculo',
        'link_veiculo',
        'ano_veiculo',
        'combustivel_veiculo',
        'portas_veiculo',
        'quilometragem_veiculo',
        'cambio_veiculo',
        'cor_veiculo',
        'preco_veiculo',
    ];

    protected $table = 'artigos';
    protected $primaryKey = 'id_veiculo';

}

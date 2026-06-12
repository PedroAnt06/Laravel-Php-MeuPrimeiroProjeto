<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model //propriamente para gerenciar os dados do banco de dados, pelo Eloquent ORM do Laravel
{
    protected $table = "produtos"; // Especifica o nome da tabela no banco de dados

    protected $fillable = [ //regra de seguranca para evitar mass assignment - que o cliente nao envie campos que n devem ser preenchidos
        'nome',
        'preco',
        'quantidade'
    ];
}

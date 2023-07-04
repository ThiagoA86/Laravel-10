<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='table_clientes';
    public $timestamps=false;
    protected $connection = 'nome-da-conexao';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function comComentarios()
    {
        return $this->hasMany('App\Models\Comentario','produto_id','id');
    }
}

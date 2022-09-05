<?php

namespace App\Models\Noticias;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Noticias\NoticiasStatusModel;

class NoticiasModel extends Model
{
    use HasFactory;

    protected $table = "noticias";

    public function status(){
        return $this->hasOne(NoticiasStatusModel::class, 'id', 'noticia_status_id');
    }

    public function comentarios(){
        return $this->hasMany(NoticiasComentariosModel::class, '','');
    }
}

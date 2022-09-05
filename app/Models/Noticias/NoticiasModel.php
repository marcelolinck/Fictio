<?php

namespace App\Models\Noticias;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Noticias\NoticiasStatusModel;
use App\Models\User;

class NoticiasModel extends Model
{
    use HasFactory;

    protected $table = "noticias";

   public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
   }
   
    public function status(){
        return $this->hasOne(NoticiasStatusModel::class, 'id', 'noticia_status_id');
    }

    public function comentarios(){
        return $this->hasMany(NoticiasComentariosModel::class, '','');
    }
}

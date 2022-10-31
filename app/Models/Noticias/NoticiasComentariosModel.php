<?php

namespace App\Models\Noticias;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class NoticiasComentariosModel extends Model
{
    use HasFactory;
    
    protected $table = 'noticia_comentarios';
    
    protected $fillable = ['noticia_id','noticia_comentario_status_id'];

    public function status(){
        
        return $this->hasOne(NoticiasComentariosStatusModel::class, 'id','noticia_comentario_status_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id')
            ->select('id', 'name', 'email');
    }

}

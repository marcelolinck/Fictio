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

    protected $fillable = ['titulo','corpo','user_id','noticia_status_id', 'criador'];

    protected $casts = [
                'tags' => 'array',
    ];

    public function tags()
    {
        return $this->hasMany(NoticiasTagsModel::class, 'noticia_id', 'id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function fotos()
    {
        return $this->hasMany(NoticiasFotosModel::class, 'noticia_id', 'id')
        ->select('noticia_id', 'noticia_foto_patch');
    }

    public function status()
    {
        return $this->hasOne(NoticiasStatusModel::class, 'id', 'noticia_status_id');
    }

    public function comentarios()
    {
        return $this->hasMany(NoticiasComentariosModel::class, 'noticia_id', 'id')
            ->select('id', 'descricao', 'descricao', 'noticia_id', 'noticia_comentario_status_id', 'user_id', 'created_at');
    }
}

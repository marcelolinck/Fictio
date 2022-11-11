<?php

namespace App\Models\Noticias;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticiasFotosModel extends Model
{
    use HasFactory;

    protected $table = "noticia_fotos";

    protected $fillable =['id','noticia_foto_path', 'noticia_id','created_at', 'updated_at'];

}

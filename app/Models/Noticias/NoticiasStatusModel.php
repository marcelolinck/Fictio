<?php

namespace App\Models\Noticias;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticiasStatusModel extends Model
{
    use HasFactory;

    protected $table = "noticia_status";

    protected $fillable = ['id','descricao'];
}

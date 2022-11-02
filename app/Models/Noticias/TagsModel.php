<?php

namespace App\Models\Noticias;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagsModel extends Model
{
    use HasFactory;

    protected $table = "tags";

    protected $fillable = [
        'id','descricao', 'destaque', 'updated_at', 'created_at' 
    ];
}

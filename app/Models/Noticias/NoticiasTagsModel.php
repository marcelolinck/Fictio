<?php

namespace App\Models\Noticias;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticiasTagsModel extends Model
{
    use HasFactory;

    protected $table = 'noticias_tags';
    
    public $timestamps = false;
}

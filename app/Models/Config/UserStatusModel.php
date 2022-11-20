<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatusModel extends Model
{
    use HasFactory;

    protected $table = "user_status";

    protected $fillable = ['descricao'];
    
}

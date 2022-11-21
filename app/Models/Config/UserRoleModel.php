<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoleModel extends Model
{
    use HasFactory;
    
    protected $table = "model_has_roles";
   
    protected $fillable = ['model_id','role_id','model_type'];
}

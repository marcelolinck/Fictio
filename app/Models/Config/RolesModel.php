<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;

class RolesModel extends Model
{
    use HasFactory;

    protected $table = "roles"; 

    protected $fillable = ['name','guard_name'];
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Config\UserStatusModel;
use App\Models\Config\UserRoleModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userStatus(){
        return $this->hasOne(UserStatusModel::class,'id','status_id');
    }

    public function resyncPerm(){
        $user = User::find(Auth::id());
        $userRole = UserRoleModel::select('role_id')->where('model_id',Auth::id())->first();
        $user->assignRole($userRole->role_id);
        if($user->status_id != 1) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Conta suspensa, fale com o Admin');
        }
    }
}

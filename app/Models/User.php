<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
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

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::Class, 'role_id');
    }

    public function actions()
    {
        return $this->role->actions;
    }

    public function hasRole($roleName)
    {
        return strtoupper($this->role->name) == strtoupper($roleName);
    }

    public function isAdmin(){
        return $this->hasRole('admin');
    }

    public function isSousAdmin(){
        return $this->hasRole('sousadmin');
    }

    public function canPerformAction($actionName)
    {
        $var = $this->role->actions;

        for($i=0; $i < count($var); $i++){
            if($var[$i]['name'] == $actionName){
                return true;
            }
        }

        return false;
    }
}

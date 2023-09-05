<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';

    protected $fillable = ['name'];

    function Users(): HasMaNy
    {
        return $this->hasMany(User::class); 
    }

    function actions(){
        return $this->belongsToMany(Action::class, 'action_role');
    }
    
}

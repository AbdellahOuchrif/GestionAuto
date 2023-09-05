<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    function roles(){
        return $this->belongsToMany(Role::class, 'action_role');
    }
    
}

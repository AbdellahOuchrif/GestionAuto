<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diver extends Model
{
    use HasFactory;

    protected $fillable = ["champ", "valeur"];
}

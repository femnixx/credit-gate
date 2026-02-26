<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasFactory;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'breed', 'points'];

}

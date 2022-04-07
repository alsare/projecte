<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prova extends Model
{   
    use HasFactory;
    protected $table = 'alsare';
    protected $fillable = [
        'name',
    ];
    protected $hidden = [
        'id',
        'created_at',
    ];
}
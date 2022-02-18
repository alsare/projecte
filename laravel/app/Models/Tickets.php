<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
    ];
    protected $hidden = [
        'author_id',
        'assigned_id',
        'status_id',
    ];
}

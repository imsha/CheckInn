<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckInnRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'inn',
        'message',
        'status',
    ];
}

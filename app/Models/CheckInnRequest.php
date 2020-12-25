<?php

namespace App\Models;

use Carbon\Carbon;
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

    protected $casts = [
        'status' => 'bool'
    ];

    public function scopeLastChecks($query)
    {
        return $query->where('updated_at', '>=', Carbon::now()->subDay());
    }
}

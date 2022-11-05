<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $connection = 'wow_char';

    public function scopeOnline($query)
    {
        return $query->where('online', 1);
    }
}

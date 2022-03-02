<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosi extends Model
{
    use HasFactory;
    public function visit()
{
    return $this->belongsToMany(Visit::class);
}
}

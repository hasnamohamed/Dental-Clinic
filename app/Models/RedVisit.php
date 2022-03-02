<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedVisit extends Model
{
    use HasFactory;
    protected $table = 'red_visit';
    public function red()
    {
        return $this->belongsTo(Red_test::class, 'red_id');
    }
    public function visit()
    {
        return $this->belongsTo(Visit::class, 'visit_id');
    }
}

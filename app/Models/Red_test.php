<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Red_test extends Model
{
    use HasFactory;
    public function visit() {
        return $this->belongsToMany(Visit::class, 'red_test_visit', 'red_test_id', 'visit_id');
    }

}

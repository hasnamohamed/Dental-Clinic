<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id','id');
    }

    public function red()  {

        return $this->belongsToMany(Red_test::class, 'red_test_visit', 'visit_id', 'red_test_id');
    }


}

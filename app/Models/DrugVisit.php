<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugVisit extends Model
{
    use HasFactory;
    protected $table = 'drug_visit';
    public function drug()
    {
        return $this->belongsTo(Drug_prescription::class, 'drug_id');
    }
    public function visit()
    {
        return $this->belongsTo(Visit::class, 'visit_id');
    }
}

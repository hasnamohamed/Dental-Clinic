<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosisVisit extends Model
{
    use HasFactory;
    protected $table = 'diagnosis_visit';
    public function diagnosis()
    {
        return $this->belongsTo(Diagnosi::class, 'diagnosis_id', 'id');
    }
    public function visit()
    {
        return $this->belongsTo(Visit::class, 'visit_id', 'id');
    }
}

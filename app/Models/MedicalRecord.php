<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'patient_id',
        'diagnosis_id',
        'details',
        'created_by',
        'created_on',
    ];

    protected function casts(): array
    {
        return [
            'created_on' => 'datetime',
        ];
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class);
    }
}

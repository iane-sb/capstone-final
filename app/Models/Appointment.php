<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'patient_id',
        'service_id',
        'schedule',
        'schedule_time',
        'status',
        'queue_number',
    ];

    // An appointment belongs to a patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // An appointment belongs to a service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
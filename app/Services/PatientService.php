<?php

namespace App\Services;

use App\Models\Patient;
use Illuminate\Support\Str;

class PatientService
{
   public function register(array $data): Patient
    {
        if (!isset($data['patient_number'])) {
            $data['patient_number'] = now()->format('Y') . '-' . Str::random(6);
        }

        return Patient::create($data);
    }
}

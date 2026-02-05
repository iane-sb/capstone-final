<?php

namespace App\Services;

use App\Models\Patient;

class PatientService
{
    public function register(array $data): Patient
    {
        return Patient::create($data);
    }
}

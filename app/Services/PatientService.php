<?php

namespace App\Services;

use App\Models\Patient;

class PatientService
{
    public function register(array $data): Patient
    {
      $exists = Patient::where('first_name', $data ['first_name'])
      ->where('middle_name', $data ['middle_name'])
      ->where('last_name', $data ['last_name'])
      ->where('date_of_birth', $data ['date_of_birth'])
      ->where('gender', $data ['gender'])
      ->where('phone', $data ['phone'])
      ->where('email', $data ['email'])
      ->where('address', $data ['address'])
      // ->where('patient_number', $data ['patient_number'])
      ->exists();
    
      if ($exists){
            throw new \Exception('You have already booked');
        }
      return patient::create([
        'first_name' => $data['first_name'],
        'middle_name' => $data['middle_name'],
        'last_name' => $data['last_name'],
        'date_of_birth' => $data['date_of_birth'],
        'gender' => $data['gender'],
        'phone' => $data['phone'],
        'email' => $data['email'],
        'address' => $data['address'],
        // 'patient_number' => $data['patient_number'],
      ]);
        
    }
}

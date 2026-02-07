<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Services\PatientService;
use App\Http\Requests\StorePatientRequest;

class PatientController extends Controller
{
    protected PatientService $patientService;

    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
    }

    public function view(){
        return view('appointment.createPatient');
    }
    
    public function storepatient(StorePatientRequest $request){
        
        $validated = $request->validate('StorePatientRequest');

         Patient::create($validated);
    }


    
}

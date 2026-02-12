<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Service;
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

    public function create(){
        
        return view('appointment.create');
    }

    
    public function storePatient(StorePatientRequest $request, PatientService $patientService)
    {
        $patientService->register($request->validated());

        return redirect()
        ->route('appointment.create')
        ->with('success', 'Patient registered successfully');

    }    
}

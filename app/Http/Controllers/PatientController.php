<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Services\PatientService;
use App\Http\Requests\StorePatientRequest;
use App\Services\AppointmentService;


class PatientController extends Controller
{   
    protected AppointmentService $appointmentService;
    protected PatientService $patientService;

    public function __construct(
        PatientService $patientService,
        AppointmentService $appointmentService
    ) 
    {
        $this->patientService = $patientService;
        $this->appointmentService = $appointmentService;
    }

    public function create()
    {
        $services = Service::where('is_active', true)->get();

        return view('appointment.create', compact('services'));
    }


    
    public function storePatient(StorePatientRequest $request)
    {
        $data = $request->validated();

        // 1️⃣ Register patient
        $patient = $this->patientService->register($data);

        // 2️⃣ Create appointment
        $appointment = $this->appointmentService->schedule([
            'patient_id' => $patient->id,
            'service_id' => $data['service_id'],
            'schedule' => $data['schedule'],
            'schedule_time' => $data['schedule_time'],
        ]);

        return redirect()
            ->route('appointment.create')
            ->with('success', 'Appointment booked successfully!');
    }

    
}

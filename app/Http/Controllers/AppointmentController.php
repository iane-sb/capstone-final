<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Services\AppointmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Nette\Utils\Json;

class AppointmentController extends Controller
{
    protected AppointmentService $appointmentService;
    
    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    public function create()
    {
        return view('appointment.create');
    }

    public function storeAppointment(StoreAppointmentRequest $request)
    {
       $validated = $request()->validate('StoreAppointmentRequest');

       Appointment::create($validated);
       
    }
}

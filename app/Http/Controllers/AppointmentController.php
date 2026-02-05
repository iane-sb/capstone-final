<?php

namespace App\Http\Controllers;

use Nette\Utils\Json;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\AppointmentService;
use App\Http\Requests\StoreAppointmentRequest;

class AppointmentController extends Controller
{
    protected AppointmentService $appointmentService;
    
    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

        public function create($patientId)
        {
        $patient = Patient::findOrFail($patientId);
        return view('appointments.create', compact('patient'));
        }

    public function store(StoreAppointmentRequest $request)
        {
        $this->appointmentService->schedule(
            $request->validated()
        );

        return redirect()->back()->with('success', 'Appointment scheduled.');
    }

    

    //kani siya diri for testing ra ni
    // public function store(StoreAppointmentRequest $requests): JsonResponse
    // {
    //     try {
    //         $appointment = $this->appointmentService->schedule(
    //             $requests->validated()
    //         );

    //         return response()->json([
    //             'message'=> 'appointment scheduled success wow',
    //             'data'=> $appointment
    //         ], 201);
    //     } catch (\Exception $e){
    //         return response()->json([
    //             'message'=> $e->getMessage()
    //         ], 409);
    //     }
    // }

    //  public function getByDate(string $date): JsonResponse 
    //  {
    //     return response()->json([
    //         'data'=> $this->appointmentService->getByDate($date)
    //     ]);
    //  }

}

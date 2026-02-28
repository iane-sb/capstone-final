<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AppointmentController extends Controller
{
    /**
     * Show the appointment booking form.
     */
    public function create()
    {
        // Fetch all active services from the database to populate the dropdown
        $services = Service::where('is_active', true)->get();
        
        return view('appointment.create', compact('services'));
    }

    /**
     * Store the new patient and their appointment.
     */
    public function storePatient(Request $request)
    {
        // 1. Validate the incoming form data
        $validated = $request->validate([
            'first_name' => 'required|string|max:30',
            'middle_name' => 'nullable|string|max:30',
            'last_name' => 'required|string|max:30',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:male,female,other',
            'phone' => 'nullable|string|max:13',
            'email' => 'nullable|email|max:30',
            'address' => 'nullable|string|max:50',
            'service_id' => 'required|exists:services,id', // Ensures service exists in DB
            'schedule' => 'required|date|after_or_equal:today',
            'schedule_time' => 'required',
        ]);

        // 2. Create the Patient First
        // We do this first so we can generate a patient ID for the appointment
        $patient = Patient::create([
            'user_id' => null, // Guest booking
            'patient_number' => 'PAT-' . strtoupper(Str::random(6)), // Generates random ID like PAT-X7B9Q1
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name' => $validated['last_name'],
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'address' => $validated['address'],
        ]);

        // 3. Create the Appointment using the new Patient's ID
        Appointment::create([
            'patient_id' => $patient->id, // Links this appointment to the patient we just created
            'service_id' => $validated['service_id'],
            'schedule' => $validated['schedule'],
            'schedule_time' => $validated['schedule_time'],
            'status' => 'pending', // Default status for new appointments
        ]);

        // 4. Redirect back to the form with a success message
        return back()->with('success', 'Your appointment has been booked successfully!');
    }
}
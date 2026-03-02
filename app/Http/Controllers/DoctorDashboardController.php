<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Diagnosis;
use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Http\Request;

class DoctorDashboardController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->query('date', now()->toDateString());

        $appointments = Appointment::with(['patient', 'service'])
            ->where('schedule', $date)
            ->orderBy('queue_number')
            ->orderBy('schedule_time')
            ->get();

        return view('doctor.dashboard', [
            'date' => $date,
            'appointments' => $appointments,
        ]);
    }

    public function addRecord(Patient $patient)
    {
        $diagnoses = Diagnosis::orderBy('name')->get();
        $currentRecord = MedicalRecord::with('diagnosis')
            ->where('patient_id', $patient->id)
            ->orderByDesc('created_on')
            ->first();

        return view('doctor.add-record', [
            'patient' => $patient,
            'diagnoses' => $diagnoses,
            'currentRecord' => $currentRecord,
        ]);
    }

    public function storeRecord(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'diagnosis_id' => 'nullable|exists:diagnoses,id',
            'diagnosis_name' => 'nullable|string|max:255',
            'details' => 'required|string|max:1000',
        ]);

        $diagnosisId = $validated['diagnosis_id'] ?? null;
        $diagnosisName = trim($validated['diagnosis_name'] ?? '');

        if (! $diagnosisId && $diagnosisName === '') {
            return back()->withErrors(['diagnosis_id' => 'Either select an existing diagnosis or enter a new diagnosis name.'])->withInput();
        }

        if (! $diagnosisId) {
            $diagnosis = Diagnosis::firstOrCreate(
                ['name' => $diagnosisName],
                [
                    'created_by' => auth()->id(),
                    'created_on' => now(),
                ]
            );
            $diagnosisId = $diagnosis->id;
        }

        $currentRecord = MedicalRecord::where('patient_id', $validated['patient_id'])
            ->orderByDesc('created_on')
            ->first();

        if ($currentRecord) {
            $currentRecord->update([
                'diagnosis_id' => $diagnosisId,
                'details' => $validated['details'],
                'updated_by' => auth()->id(),
                'updated_on' => now(),
            ]);
        } else {
            MedicalRecord::create([
                'patient_id' => $validated['patient_id'],
                'diagnosis_id' => $diagnosisId,
                'details' => $validated['details'],
                'created_by' => auth()->id(),
                'created_on' => now(),
            ]);
        }

        return redirect()
            ->route('doctor.medical-records', ['patient_id' => $validated['patient_id']])
            ->with('success', $currentRecord ? 'Medical record updated successfully.' : 'Medical record added successfully.');
    }

    public function medicalRecords(Request $request)
    {
        $date = $request->query('date', now()->toDateString());

        try {
            $date = \Carbon\Carbon::parse($date)->toDateString();
        } catch (\Exception $e) {
            $date = now()->toDateString();
        }

        $query = MedicalRecord::with(['patient', 'diagnosis', 'creator'])
            ->whereDate('created_on', $date)
            ->orderBy('created_on', 'desc');

        $patientId = $request->query('patient_id');
        if ($patientId) {
            $query->where('patient_id', $patientId);
        }

        $records = $query->paginate(15);

        return view('doctor.medical-records', [
            'records' => $records,
            'patientId' => $patientId,
            'date' => $date,
        ]);
    }
}

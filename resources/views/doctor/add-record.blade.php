<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Medical Record — {{ $patient->full_name }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <a href="{{ route('doctor.dashboard') }}" class="text-gray-600 hover:text-blue-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                    </a>
                    <div>
                        <h1 class="text-lg font-bold text-gray-800">Add Medical Record</h1>
                        <p class="text-xs text-gray-500">{{ $patient->full_name }}</p>
                    </div>
                </div>
                <a href="{{ route('doctor.medical-records', ['patient_id' => $patient->id]) }}"
                   class="text-gray-600 hover:text-blue-600 font-medium text-sm">View records</a>
            </div>
        </div>
    </header>

    <main class="min-h-screen py-10 px-4">
        <div class="max-w-2xl mx-auto">
            @if($errors->any())
                <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-700 border border-red-300">
                    <ul class="list-disc pl-5 space-y-1 text-sm">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <form method="POST" action="{{ route('doctor.medical-records.store') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ $patient->id }}">

                    <div>
                        <label for="diagnosis_id" class="block text-sm font-medium text-gray-700 mb-1">Select existing diagnosis (optional)</label>
                        <select id="diagnosis_id" name="diagnosis_id"
                                class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            <option value="">— Choose existing or type new below —</option>
                            @foreach($diagnoses as $d)
                                <option value="{{ $d->id }}" {{ old('diagnosis_id') == $d->id ? 'selected' : '' }}>{{ $d->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="diagnosis_name" class="block text-sm font-medium text-gray-700 mb-1">Or type new diagnosis name</label>
                        <input type="text" id="diagnosis_name" name="diagnosis_name" value="{{ old('diagnosis_name') }}"
                               placeholder="e.g. Upper respiratory infection"
                               class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        <p class="text-xs text-gray-500 mt-1">Leave blank if you selected an existing diagnosis above.</p>
                    </div>

                    <div>
                        <label for="details" class="block text-sm font-medium text-gray-700 mb-1">Details *</label>
                        <textarea id="details" name="details" rows="4" required
                                  class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                                  placeholder="Clinical notes, findings, treatment...">{{ old('details') }}</textarea>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2.5 rounded-xl font-semibold hover:bg-blue-700 transition">
                            Save medical record
                        </button>
                        <a href="{{ route('doctor.dashboard') }}" class="bg-gray-100 text-gray-700 px-6 py-2.5 rounded-xl font-semibold hover:bg-gray-200 transition">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

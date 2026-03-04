<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-gray-50 text-slate-900">

    {{-- Top Bar (match landing + staff theme) --}}
    <header class="sticky top-0 z-50 bg-white border-b border-black/5">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between py-4">

                {{-- Brand --}}
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div
                        class="bg-green-600 text-white w-10 h-10 rounded-lg flex items-center justify-center shadow-sm">

                        {{-- Medical Shield + Bold Cross --}}
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21c4.418 0 8-4.03 8-9V6.4a2 2 0 0 0-1.2-1.83l-6-2.7a2 2 0 0 0-1.6 0l-6 2.7A2 2 0 0 0 4 6.4V12c0 4.97 3.582 9 8 9Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6M9 12h6" />
                        </svg>

                    </div>

                    <div class="leading-tight">
                        <div class="font-semibold text-lg text-gray-800">RuralHealth Unit</div>
                        <div class="text-xs text-gray-500">Doctor Dashboard</div>
                    </div>
                </a>

                {{-- Right: Links + User --}}
                <div class="flex items-center gap-3 sm:gap-4">

                    <a href="{{ route('doctor.medical-records') }}"
                        class="hidden sm:inline-flex items-center gap-2 text-gray-600 hover:text-green-600 font-medium text-sm transition">
                        {{-- File/Records icon --}}
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125V5.25A2.25 2.25 0 0 0 11.25 3h-4.5A2.25 2.25 0 0 0 4.5 5.25v13.5A2.25 2.25 0 0 0 6.75 21h4.5" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 17.25h3.75m-3.75 3h3.75m-9.75-6.75h3.75" />
                        </svg>
                        Medical Records
                    </a>

                    @auth
                        <div class="hidden md:flex items-center gap-3">
                            <div class="text-right">
                                <p class="text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500">Doctor</p>
                            </div>
                            <div
                                class="w-9 h-9 bg-green-100 rounded-full flex items-center justify-center border border-green-200">
                                <span class="text-green-700 font-semibold text-sm">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </span>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('staff.logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition shadow-sm">
                                {{-- Logout icon --}}
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6A2.25 2.25 0 0 0 5.25 5.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H9m9 0-3-3m3 3-3 3" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    @endauth
                </div>

            </div>
        </div>
    </header>


    {{-- Page --}}
    <main class="py-10">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Heading + Date Filter --}}
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-8">
                <div>
                    <h1 class="text-3xl font-extrabold tracking-tight text-slate-900">Today’s Queue</h1>
                    <p class="text-slate-600 mt-2">
                        Appointments for
                        <span class="font-semibold text-slate-900">
                            {{ \Carbon\Carbon::parse($date)->format('F d, Y') }}
                        </span>
                    </p>
                </div>

                <form method="GET" action="{{ route('doctor.dashboard') }}"
                    class="bg-white border border-black/5 rounded-2xl p-4 shadow-sm flex flex-col sm:flex-row sm:items-center gap-3">
                    <div class="flex items-center gap-2">
                        {{-- Calendar icon --}}
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z" />
                        </svg>
                        <label class="text-sm font-medium text-slate-700">Select date</label>
                    </div>

                    <input type="date" name="date" value="{{ $date }}"
                        class="w-full sm:w-auto border border-gray-200 rounded-lg px-3 py-2 text-sm bg-white focus:ring-2 focus:ring-green-400 focus:outline-none">

                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 bg-green-600 text-white text-sm font-semibold px-5 py-2 rounded-lg hover:bg-green-700 transition shadow-sm">
                        {{-- Search icon --}}
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-4.35-4.35m0 0A7.5 7.5 0 1 0 6.75 6.75a7.5 7.5 0 0 0 9.9 9.9Z" />
                        </svg>
                        Go
                    </button>
                </form>
            </div>


            {{-- Alerts --}}
            @if (session('success'))
                <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-green-800 shadow-sm">
                    <div class="flex items-start gap-3">
                        {{-- Check circle --}}
                        <svg class="w-5 h-5 text-green-700 mt-0.5" fill="none" stroke="currentColor"
                            stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <div class="text-sm font-medium">{{ session('success') }}</div>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-red-800 shadow-sm">
                    <div class="flex items-start gap-3">
                        {{-- Error icon --}}
                        <svg class="w-5 h-5 text-red-700 mt-0.5" fill="none" stroke="currentColor"
                            stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m0 3h.008M10.29 3.86 1.82 18a1.5 1.5 0 0 0 1.29 2.25h17.78A1.5 1.5 0 0 0 22.18 18L13.71 3.86a1.5 1.5 0 0 0-2.42 0Z" />
                        </svg>
                        <div>
                            <p class="font-semibold mb-2">Please fix the following:</p>
                            <ul class="list-disc pl-5 space-y-1 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif


            {{-- Table --}}
            <div class="bg-white rounded-2xl shadow-sm border border-black/5 overflow-hidden">
                <div class="px-6 py-4 border-b border-black/5 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        {{-- List icon --}}
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 6.75h12M8.25 12h12M8.25 17.25h12M3.75 6.75h.007v.008H3.75V6.75Zm0 5.25h.007v.008H3.75V12Zm0 5.25h.007v.008H3.75v-.008Z" />
                        </svg>
                        <h3 class="text-lg font-semibold text-slate-900">Patients in Queue</h3>
                    </div>
                    <span class="text-sm text-slate-500">
                        Total: <span class="font-semibold text-slate-900">{{ $appointments->count() }}</span>
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50">
                            <tr class="text-left text-slate-600">
                                <th class="px-6 py-3 font-semibold">Queue #</th>
                                <th class="px-6 py-3 font-semibold">Time</th>
                                <th class="px-6 py-3 font-semibold">Patient</th>
                                <th class="px-6 py-3 font-semibold">Service</th>
                                <th class="px-6 py-3 font-semibold">Status</th>
                                <th class="px-6 py-3 font-semibold">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-black/5">
                            @forelse($appointments as $appointment)
                                @php
                                    $status = $appointment->status;
                                    $badgeClasses = match ($status) {
                                        'started' => 'bg-blue-50 text-blue-700 ring-blue-200',
                                        'completed' => 'bg-green-50 text-green-700 ring-green-200',
                                        'cancelled' => 'bg-red-50 text-red-700 ring-red-200',
                                        default => 'bg-gray-50 text-gray-700 ring-gray-200',
                                    };
                                @endphp

                                <tr class="hover:bg-gray-50/60">
                                    <td class="px-6 py-4 font-mono">
                                        Q-{{ str_pad($appointment->queue_number, 3, '0', STR_PAD_LEFT) }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($appointment->schedule_time)->format('h:i A') }}
                                    </td>

                                    <td class="px-6 py-4">
                                        @if ($appointment->patient)
                                            <div class="font-medium text-slate-900">
                                                {{ $appointment->patient->first_name }}
                                                {{ $appointment->patient->last_name }}
                                            </div>
                                        @else
                                            <span class="text-slate-400 italic">—</span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ optional($appointment->service)->name ?? '—' }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold ring-1 {{ $badgeClasses }}">
                                            <span class="w-1.5 h-1.5 rounded-full bg-current opacity-70"></span>
                                            {{ ucfirst($appointment->status) }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4">
                                        @if ($appointment->patient && $appointment->status === 'started')
                                            <a href="{{ route('doctor.patients.add-record', ['patient' => $appointment->patient, 'appointment_id' => $appointment->id]) }}"
                                                class="inline-flex items-center gap-2 bg-green-600 text-white text-xs font-semibold px-3 py-2 rounded-lg hover:bg-green-700 transition shadow-sm">

                                                {{-- Plus icon --}}
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>

                                                Add diagnosis
                                            </a>
                                        @elseif($appointment->patient)
                                            <span class="text-xs text-slate-400">Diagnosis available when status is
                                                “started”</span>
                                        @else
                                            —
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-10 text-center text-slate-500">
                                        <div class="flex flex-col items-center gap-2">
                                            {{-- Empty state --}}
                                            <svg class="w-12 h-12 text-slate-300" fill="none"
                                                stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m15 9-6 6m0-6 6 6" />
                                            </svg>
                                            <p class="font-medium">No appointments for this date.</p>
                                            <p class="text-sm text-slate-400">Try selecting another date.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="h-10"></div>
        </div>
    </main>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medical Records</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-gray-50 text-slate-900">

    {{-- Top Bar (match landing + dashboards) --}}
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
                        <div class="text-xs text-gray-500">Medical Records</div>
                    </div>
                </a>

                {{-- Right: Dashboard + Logout --}}
                <div class="flex items-center gap-3 sm:gap-4">
                    <a href="{{ route('doctor.dashboard') }}"
                        class="inline-flex items-center gap-2 text-gray-600 hover:text-green-600 font-medium text-sm transition">

                        {{-- Back / Dashboard icon --}}
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 6.75 5.25 12l5.25 5.25M6 12h12.75" />
                        </svg>

                        Dashboard
                    </a>

                    @auth
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


    <main class="py-10">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Success --}}
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


            {{-- Card --}}
            <div class="bg-white rounded-2xl shadow-sm border border-black/5 overflow-hidden">

                {{-- Header + Filters --}}
                <div
                    class="px-6 py-4 border-b border-black/5 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

                    <div>
                        <div class="flex items-center gap-2">
                            {{-- Records icon --}}
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125V5.25A2.25 2.25 0 0 0 11.25 3h-4.5A2.25 2.25 0 0 0 4.5 5.25v13.5A2.25 2.25 0 0 0 6.75 21h4.5" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.75 12h3.75M9.75 15.75h3.75" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 17.25h3.75m-3.75 3h3.75" />
                            </svg>

                            <h2 class="text-lg font-semibold text-slate-900">Records</h2>
                        </div>

                        <p class="text-xs text-slate-500 mt-1">
                            Records for:
                            <span class="font-semibold text-slate-900">
                                {{ \Carbon\Carbon::parse($date ?? now()->toDateString())->format('F d, Y') }}
                            </span>

                            @if ($patientId && $records->first() && $records->first()->patient)
                                — for {{ $records->first()->patient->full_name }}
                            @elseif($patientId)
                                — for selected patient
                            @endif
                        </p>
                    </div>


                    {{-- Filters --}}
                    <div class="flex flex-col sm:flex-row sm:items-center gap-3">

                        <form method="GET" action="{{ route('doctor.medical-records') }}"
                            class="bg-gray-50 border border-black/5 rounded-2xl p-4 shadow-sm flex flex-col md:flex-row md:items-end gap-3 w-full">

                            {{-- Date --}}
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-slate-600">Date</label>
                                <div class="relative">
                                    <input type="date" name="date" value="{{ $date ?? now()->toDateString() }}"
                                        class="w-full md:w-44 border border-gray-200 rounded-lg px-3 py-2 text-sm bg-white focus:ring-2 focus:ring-green-400 focus:outline-none">
                                </div>
                            </div>

                            {{-- Patient Search --}}
                            <div class="flex flex-col gap-1 flex-1">
                                <label class="text-xs font-semibold text-slate-600">Patient</label>
                                <div class="relative">
                                    <input type="text" name="search" value="{{ $search ?? request('search') }}"
                                        placeholder="Search by patient name"
                                        class="w-full border border-gray-200 rounded-lg pl-10 pr-3 py-2 text-sm bg-white focus:ring-2 focus:ring-green-400 focus:outline-none">
                                    {{-- Search icon --}}
                                    <svg class="w-5 h-5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2"
                                        fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m21 21-4.35-4.35m0 0A7.5 7.5 0 1 0 6.75 6.75a7.5 7.5 0 0 0 9.9 9.9Z" />
                                    </svg>
                                </div>
                            </div>

                            @if ($patientId)
                                <input type="hidden" name="patient_id" value="{{ $patientId }}">
                            @endif

                            {{-- Button --}}
                            <button type="submit"
                                class="inline-flex items-center justify-center gap-2 bg-green-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-700 transition shadow-sm">
                                {{-- Filter icon --}}
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 4.5h18m-14 7.5h10m-6 7.5h2" />
                                </svg>
                                Filter
                            </button>
                        </form>

                        @if ($patientId)
                            <a href="{{ route('doctor.medical-records', ['date' => $date ?? now()->toDateString(), 'search' => $search ?? request('search')]) }}"
                                class="text-sm text-green-700 hover:text-green-800 font-semibold transition whitespace-nowrap">
                                Show all patients
                            </a>
                        @endif
                    </div>
                </div>


                {{-- Table --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50">
                            <tr class="text-left text-slate-600">
                                <th class="px-6 py-3 font-semibold">Patient</th>
                                <th class="px-6 py-3 font-semibold">Diagnosis</th>
                                <th class="px-6 py-3 font-semibold">Details</th>
                                <th class="px-6 py-3 font-semibold">Created by</th>
                                <th class="px-6 py-3 font-semibold">Date</th>
                                <th class="px-6 py-3 font-semibold">Last updated</th>
                                <th class="px-6 py-3 font-semibold">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-black/5">
                            @forelse($records as $record)
                                <tr class="hover:bg-gray-50/60">

                                    <td class="px-6 py-4">
                                        <a href="{{ route('doctor.medical-records', ['patient_id' => $record->patient_id, 'date' => $date ?? now()->toDateString()]) }}"
                                            class="text-green-700 hover:text-green-800 font-semibold transition">
                                            {{ $record->patient ? $record->patient->full_name : '—' }}
                                        </a>
                                    </td>

                                    <td class="px-6 py-4">
                                        <span class="text-slate-700">
                                            {{ $record->diagnosis ? $record->diagnosis->name : '—' }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 max-w-xs truncate" title="{{ $record->details }}">
                                        {{ Str::limit($record->details, 50) }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $record->creator ? $record->creator->name : '—' }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $record->created_on ? $record->created_on->format('M d, Y H:i') : '—' }}
                                    </td>

                                    <td class="px-6 py-4">
                                        @if ($record->updated_on)
                                            <div class="text-xs text-slate-700">
                                                {{ $record->updated_on->format('M d, Y H:i') }}
                                            </div>
                                            <div class="text-xs text-slate-500">
                                                {{ $record->updater ? $record->updater->name : '—' }}
                                            </div>
                                        @else
                                            <span class="text-slate-400">—</span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4">
                                        @if ($record->patient)
                                            <a href="{{ route('doctor.patients.add-record', $record->patient) }}"
                                                class="inline-flex items-center gap-2 bg-green-600 text-white text-xs font-semibold px-3 py-2 rounded-lg hover:bg-green-700 transition shadow-sm">

                                                {{-- Pencil icon --}}
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L9.832 16.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.895.895-2.685a4.5 4.5 0 0 1 1.13-1.897L16.862 4.487Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 7.125 16.875 4.5" />
                                                </svg>

                                                Edit current
                                            </a>
                                        @else
                                            —
                                        @endif
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-10 text-center text-slate-500">
                                        <div class="flex flex-col items-center gap-2">
                                            {{-- Empty icon --}}
                                            <svg class="w-12 h-12 text-slate-300" fill="none"
                                                stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125V5.25A2.25 2.25 0 0 0 11.25 3h-4.5A2.25 2.25 0 0 0 4.5 5.25v13.5A2.25 2.25 0 0 0 6.75 21h4.5" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9.75 12h3.75M9.75 15.75h3.75" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 15l6 6m0-6-6 6" />
                                            </svg>

                                            <p class="font-medium">No medical records found.</p>
                                            <p class="text-sm text-slate-400">Try changing the date or searching a
                                                patient.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if ($records->hasPages())
                    <div class="px-6 py-3 border-t border-black/5">
                        {{ $records->withQueryString()->links() }}
                    </div>
                @endif

            </div>
        </div>
    </main>
</body>

</html>

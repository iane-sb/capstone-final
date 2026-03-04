<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-gray-50 text-slate-900">

    {{-- Top Bar (Landing-page style) --}}
    <header class="sticky top-0 z-50 bg-white border-b border-black/5">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between py-4">

                {{-- Left: Brand --}}
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="bg-green-600 text-white w-10 h-10 rounded-lg flex items-center justify-center shadow-sm">
                        {{-- Shield / Health icon (offline SVG) --}}
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M12 21c4.418 0 8-4.03 8-9V6.4a2 2 0 0 0-1.2-1.83l-6-2.7a2 2 0 0 0-1.6 0l-6 2.7A2 2 0 0 0 4 6.4V12c0 4.97 3.582 9 8 9Z" />
                        </svg>
                    </div>
                    <div class="leading-tight">
                        <div class="font-semibold text-lg text-gray-800">RuralHealth Unit</div>
                        <div class="text-xs text-gray-500">Staff Dashboard</div>
                    </div>
                </a>

                {{-- Middle: Quick Links (optional, consistent with landing nav) --}}
                <nav class="hidden lg:flex items-center gap-8 text-gray-600 font-medium">
                    <a href="{{ url('/#services') }}" class="hover:text-green-600 transition">Services</a>
                    <a href="{{ url('/#doctors') }}" class="hover:text-green-600 transition">Doctors</a>
                    <a href="{{ url('/#contact') }}" class="hover:text-green-600 transition">Contact</a>
                </nav>

                {{-- Right: User + Logout --}}
                <div class="flex items-center gap-3">
                    @auth
                        <div class="hidden md:flex items-center gap-3">
                            <div class="text-right">
                                <p class="text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                                @if (auth()->user()->staff)
                                    <p class="text-xs text-gray-500">{{ auth()->user()->staff->position }}</p>
                                @endif
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
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18 12H9m9 0-3-3m3 3-3 3" />
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
                    <h1 class="text-3xl font-extrabold tracking-tight text-slate-900">Queue Dashboard</h1>
                    <p class="text-slate-600 mt-2">
                        Queue and appointments for
                        <span class="font-semibold text-slate-900">
                            {{ \Carbon\Carbon::parse($date)->format('F d, Y') }}
                        </span>
                    </p>
                </div>

                <form method="GET" action="{{ route('staff.dashboard') }}"
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
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" aria-hidden="true">
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
                        <svg class="w-5 h-5 text-red-700 mt-0.5" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" aria-hidden="true">
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

            {{-- KPI Cards --}}
            @php
                $statusLabels = [
                    'not started' => 'Not started',
                    'started' => 'Started',
                    'completed' => 'Completed',
                    'cancelled' => 'Cancelled',
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
                {{-- Total --}}
                <div class="bg-white rounded-2xl border border-black/5 shadow-sm p-5">
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-slate-500">Today’s appointments</p>
                        {{-- Users icon --}}
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 0 0 3-6.72A9 9 0 1 0 3 12a9.094 9.094 0 0 0 3 6.72" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 11.25a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </div>
                    <p class="mt-3 text-3xl font-extrabold text-slate-900">{{ $totalCount }}</p>
                    <p class="mt-1 text-xs text-slate-500">Total scheduled for selected date</p>
                </div>

                {{-- Status Cards --}}
                @foreach ($statusLabels as $statusKey => $label)
                    @php
                        $accent = match ($statusKey) {
                            'started' => 'text-blue-600',
                            'completed' => 'text-green-600',
                            'cancelled' => 'text-red-600',
                            default => 'text-slate-600',
                        };
                    @endphp

                    <div class="bg-white rounded-2xl border border-black/5 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-slate-500">{{ $label }}</p>

                            {{-- Status icon (SVG based on status key) --}}
                            @if ($statusKey === 'not started')
                                <svg class="w-6 h-6 {{ $accent }}" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3h10.5M6.75 21h10.5M8.25 3v3.75c0 1.657.658 3.246 1.83 4.418L12 13.09l1.92-1.922a6.25 6.25 0 0 0 1.83-4.418V3M8.25 21v-3.75c0-1.657.658-3.246 1.83-4.418L12 10.91l1.92 1.922a6.25 6.25 0 0 1 1.83 4.418V21" />
                                </svg>
                            @elseif ($statusKey === 'started')
                                <svg class="w-6 h-6 {{ $accent }}" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 8.25 16.5 12l-6 3.75V8.25Z" />
                                </svg>
                            @elseif ($statusKey === 'completed')
                                <svg class="w-6 h-6 {{ $accent }}" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            @elseif ($statusKey === 'cancelled')
                                <svg class="w-6 h-6 {{ $accent }}" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m15 9-6 6m0-6 6 6" />
                                </svg>
                            @else
                                <svg class="w-6 h-6 {{ $accent }}" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.25 11.25h1.5v5.25h-1.5v-5.25ZM12 7.5h.008v.008H12V7.5Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 21a9 9 0 1 0-9-9 9 9 0 0 0 9 9Z" />
                                </svg>
                            @endif
                        </div>

                        <p class="mt-3 text-2xl font-extrabold text-slate-900">
                            {{ $statusCounts[$statusKey] ?? 0 }}
                        </p>
                        <p class="mt-1 text-xs text-slate-500">Count</p>
                    </div>
                @endforeach
            </div>

            {{-- Queue Table Card --}}
            <div class="bg-white rounded-2xl border border-black/5 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-black/5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                    <div class="flex items-center gap-2">
                        {{-- List icon --}}
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 6.75h12M8.25 12h12M8.25 17.25h12M3.75 6.75h.007v.008H3.75V6.75Zm0 5.25h.007v.008H3.75V12Zm0 5.25h.007v.008H3.75v-.008Z" />
                        </svg>
                        <h3 class="text-lg font-semibold text-slate-900">Today’s Queue</h3>
                    </div>
                    <div class="text-sm text-slate-500">
                        Total: <span class="font-semibold text-slate-900">{{ $appointments->count() }}</span>
                    </div>
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
                            @forelse ($appointments as $appointment)
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
                                            <span class="text-slate-400 italic">No patient</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-slate-700">
                                            {{ optional($appointment->service)->name ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold ring-1 {{ $badgeClasses }}">
                                            <span class="w-1.5 h-1.5 rounded-full bg-current opacity-70"></span>
                                            {{ ucfirst($status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form method="POST"
                                            action="{{ route('staff.appointments.updateStatus', $appointment) }}"
                                            class="flex flex-col sm:flex-row sm:items-center gap-2">
                                            @csrf
                                            @method('PATCH')

                                            <select name="status"
                                                class="w-full sm:w-auto border border-gray-200 rounded-lg px-3 py-2 text-xs bg-white focus:ring-2 focus:ring-green-400 focus:outline-none">
                                                <option value="not started" @selected($appointment->status === 'not started')>Not started</option>
                                                <option value="started" @selected($appointment->status === 'started')>Started</option>
                                                <option value="completed" @selected($appointment->status === 'completed')>Completed</option>
                                                <option value="cancelled" @selected($appointment->status === 'cancelled')>Cancelled</option>
                                            </select>

                                            <button type="submit"
                                                class="inline-flex items-center justify-center gap-2 bg-green-600 text-white text-xs font-semibold px-4 py-2 rounded-lg hover:bg-green-700 transition shadow-sm">
                                                {{-- Sync icon --}}
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5"
                                                    viewBox="0 0 24 24" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.023 9.348h4.992V4.356m0 0a9 9 0 1 0 2.636 6.364M7.977 14.652H2.985v4.992m0 0A9 9 0 1 0 .349 13.356" />
                                                </svg>
                                                Update
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-10 text-center text-slate-500">
                                        <div class="flex flex-col items-center gap-2">
                                            {{-- Empty state calendar-x icon --}}
                                            <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor"
                                                stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m15 9-6 6m0-6 6 6" />
                                            </svg>
                                            <p class="font-medium">No appointments scheduled for this date.</p>
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
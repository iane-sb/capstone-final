<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff Dashboard - Rural Health Unit</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background-light font-display text-slate-900 antialiased">
    
    <header class="bg-white shadow-sm border-b border-primary/10 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <div class="bg-primary p-2 rounded-lg shadow-sm">
                        <span class="material-symbols-outlined text-white text-xl block">health_and_safety</span>
                    </div>
                    <div>
                        <h1 class="text-lg font-extrabold text-slate-900 tracking-tight">Staff Dashboard</h1>
                        <p class="text-xs text-slate-500 font-medium">Smart Queue Management</p>
                    </div>
                </div>

                <div class="flex items-center space-x-6">
                    @auth
                        <div class="hidden md:flex items-center space-x-3 text-sm border-r border-slate-200 pr-6">
                            <div class="text-right">
                                <p class="font-bold text-slate-800">{{ auth()->user()->name }}</p>
                                @if(auth()->user()->staff)
                                    <p class="text-xs text-primary font-semibold">{{ auth()->user()->staff->position }}</p>
                                @endif
                            </div>
                            <div class="w-9 h-9 bg-primary/10 rounded-full flex items-center justify-center border border-primary/20">
                                <span class="text-primary font-bold">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </span>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('staff.logout') }}" class="m-0">
                            @csrf
                            <button type="submit" 
                                    class="text-slate-500 hover:text-red-600 hover:bg-red-50 px-3 py-2 rounded-lg text-sm font-semibold transition-colors flex items-center space-x-2">
                                <span class="material-symbols-outlined text-lg">logout</span>
                                <span class="hidden sm:inline">Logout</span>
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main class="min-h-[calc(100vh-64px)] py-8 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto">
            
            <div class="mb-8 flex flex-col md:flex-row md:items-end md:justify-between gap-4 bg-white p-6 rounded-2xl shadow-sm border border-primary/5">
                <div>
                    <h2 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">calendar_month</span>
                        Daily Overview
                    </h2>
                    <p class="text-slate-500 mt-1 text-sm">
                        Showing data for <span class="font-bold text-primary">{{ \Carbon\Carbon::parse($date)->format('l, F d, Y') }}</span>
                    </p>
                </div>
                
                <form method="GET" action="{{ route('staff.dashboard') }}" class="flex items-center gap-3">
                    <div class="relative">
                        <input type="date"
                               name="date"
                               value="{{ $date }}"
                               class="pl-4 pr-10 py-2.5 border border-slate-200 rounded-xl text-sm font-medium text-slate-700 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-primary focus:border-primary focus:outline-none transition-colors cursor-pointer">
                    </div>
                    <button type="submit"
                            class="bg-slate-900 text-white text-sm font-bold px-5 py-2.5 rounded-xl hover:bg-slate-800 transition shadow-md flex items-center gap-2">
                        Filter
                    </button>
                </form>
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-green-50 text-green-800 border border-green-200 flex items-center gap-3 shadow-sm">
                    <span class="material-symbols-outlined text-green-600">check_circle</span>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-red-50 text-red-700 border border-red-200 flex items-start gap-3 shadow-sm">
                    <span class="material-symbols-outlined text-red-500 shrink-0">error</span>
                    <ul class="list-disc pl-4 space-y-1 text-sm font-medium">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8">
                <div class="bg-primary text-white rounded-2xl shadow-lg shadow-primary/20 p-5 relative overflow-hidden col-span-2 md:col-span-1">
                    <div class="absolute -right-4 -top-4 opacity-20">
                        <span class="material-symbols-outlined" style="font-size: 100px;">group</span>
                    </div>
                    <p class="text-primary-100 font-medium text-sm relative z-10">Total Appointments</p>
                    <p class="mt-1 text-4xl font-black relative z-10">{{ $totalCount }}</p>
                </div>

                @php
                    $statusConfig = [
                        'not started' => ['label' => 'Waiting', 'icon' => 'pending', 'color' => 'slate'],
                        'started' => ['label' => 'In Progress', 'icon' => 'vital_signs', 'color' => 'blue'],
                        'completed' => ['label' => 'Completed', 'icon' => 'task_alt', 'color' => 'green'],
                        'cancelled' => ['label' => 'Cancelled', 'icon' => 'cancel', 'color' => 'red'],
                    ];
                @endphp

                @foreach ($statusConfig as $statusKey => $config)
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5 flex flex-col justify-between hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-start mb-2">
                            <p class="text-sm font-semibold text-slate-500">{{ $config['label'] }}</p>
                            <span class="material-symbols-outlined text-{{ $config['color'] }}-400">{{ $config['icon'] }}</span>
                        </div>
                        <p class="text-3xl font-black text-slate-800">
                            {{ $statusCounts[$statusKey] ?? 0 }}
                        </p>
                    </div>
                @endforeach
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                    <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">format_list_numbered</span>
                        Live Queue Manager
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-slate-50 border-b border-slate-200">
                            <tr>
                                <th class="px-6 py-4 text-left font-bold text-slate-600 uppercase tracking-wider text-xs">Queue #</th>
                                <th class="px-6 py-4 text-left font-bold text-slate-600 uppercase tracking-wider text-xs">Time</th>
                                <th class="px-6 py-4 text-left font-bold text-slate-600 uppercase tracking-wider text-xs">Patient Name</th>
                                <th class="px-6 py-4 text-left font-bold text-slate-600 uppercase tracking-wider text-xs">Service Type</th>
                                <th class="px-6 py-4 text-left font-bold text-slate-600 uppercase tracking-wider text-xs">Current Status</th>
                                <th class="px-6 py-4 text-right font-bold text-slate-600 uppercase tracking-wider text-xs">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($appointments as $appointment)
                                <tr class="hover:bg-slate-50/80 transition-colors group">
                                    <td class="px-6 py-4">
                                        <div class="inline-flex items-center justify-center px-3 py-1 bg-slate-100 text-slate-700 font-mono font-bold rounded-lg border border-slate-200">
                                            Q-{{ str_pad($appointment->queue_number, 3, '0', STR_PAD_LEFT) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-slate-700">
                                        {{ \Carbon\Carbon::parse($appointment->schedule_time)->format('h:i A') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($appointment->patient)
                                            <div class="font-bold text-slate-900">
                                                {{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}
                                            </div>
                                            <div class="text-xs text-slate-500 mt-0.5">{{ $appointment->patient->patient_number ?? 'New Patient' }}</div>
                                        @else
                                            <span class="text-slate-400 italic">No patient record</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="font-medium text-slate-700">{{ optional($appointment->service)->name ?? 'Unassigned' }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $status = $appointment->status;
                                            $badgeClasses = match ($status) {
                                                'started' => 'bg-blue-50 text-blue-700 border-blue-200',
                                                'completed' => 'bg-green-50 text-green-700 border-green-200',
                                                'cancelled' => 'bg-red-50 text-red-700 border-red-200',
                                                default => 'bg-slate-100 text-slate-700 border-slate-200',
                                            };
                                        @endphp
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold border {{ $badgeClasses }}">
                                            <span class="w-1.5 h-1.5 rounded-full mr-2 {{ str_contains($badgeClasses, 'text-blue') ? 'bg-blue-500' : (str_contains($badgeClasses, 'text-green') ? 'bg-green-500' : (str_contains($badgeClasses, 'text-red') ? 'bg-red-500' : 'bg-slate-400')) }}"></span>
                                            {{ ucfirst($status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <form method="POST"
                                              action="{{ route('staff.appointments.updateStatus', $appointment) }}"
                                              class="flex items-center justify-end gap-2 m-0">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status"
                                                    class="border border-slate-300 rounded-lg px-3 py-1.5 text-xs font-medium text-slate-700 bg-white focus:ring-2 focus:ring-primary focus:border-primary focus:outline-none transition-shadow">
                                                <option value="not started" @selected($appointment->status === 'not started')>Not started</option>
                                                <option value="started" @selected($appointment->status === 'started')>Start Service</option>
                                                <option value="completed" @selected($appointment->status === 'completed')>Mark Completed</option>
                                                <option value="cancelled" @selected($appointment->status === 'cancelled')>Cancel</option>
                                            </select>
                                            <button type="submit"
                                                    class="bg-white border border-slate-300 text-slate-700 hover:bg-slate-50 hover:text-primary text-xs font-bold w-8 h-8 rounded-lg flex items-center justify-center transition shadow-sm group-hover:border-primary/30">
                                                <span class="material-symbols-outlined text-sm">save</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-50 mb-4">
                                            <span class="material-symbols-outlined text-slate-300 text-3xl">inbox</span>
                                        </div>
                                        <p class="text-slate-500 font-medium text-base">No appointments scheduled for this date.</p>
                                        <p class="text-slate-400 text-sm mt-1">Check back later or select a different date.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
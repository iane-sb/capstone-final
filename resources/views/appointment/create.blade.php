@extends('welcome')

@section('title', 'Book Appointment')

@section('content')

<div class="min-h-screen bg-gray-50 py-12 px-4">
    <div class="max-w-4xl mx-auto">

        {{-- Card --}}
        <div class="bg-white border border-black/5 shadow-sm rounded-2xl p-6 sm:p-8">

            {{-- Title --}}
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900">
                    Book an Appointment
                </h2>
                <p class="text-slate-600 mt-2">
                    Please fill in your details to register and schedule your visit.
                </p>
            </div>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-green-800 shadow-sm" role="alert">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-start gap-3">
                            {{-- Check --}}
                            <svg class="w-6 h-6 text-green-700 mt-0.5" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                            <div>
                                <h3 class="font-bold text-lg mb-1">Appointment Booked Successfully!</h3>
                                <p class="text-green-700">{{ session('success') }}</p>
                            </div>
                        </div>

                        <button type="button"
                                onclick="this.parentElement.parentElement.style.display='none'"
                                class="text-green-700 hover:text-green-900"
                                aria-label="Dismiss success message">
                            {{-- X --}}
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            {{-- Error Messages --}}
            @if($errors->any())
                <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-red-800 shadow-sm" role="alert">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-start gap-3">
                            {{-- Warning --}}
                            <svg class="w-6 h-6 text-red-700 mt-0.5" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m0 3h.008M10.29 3.86 1.82 18a1.5 1.5 0 0 0 1.29 2.25h17.78A1.5 1.5 0 0 0 22.18 18L13.71 3.86a1.5 1.5 0 0 0-2.42 0Z" />
                            </svg>

                            <div>
                                <h3 class="font-semibold mb-2">Please fill up the following:</h3>
                                <ul class="list-disc pl-5 space-y-1 text-sm">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <button type="button"
                                onclick="this.parentElement.parentElement.style.display='none'"
                                class="text-red-700 hover:text-red-900"
                                aria-label="Dismiss error message">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif


            <form method="POST" action="{{ route('appointment.storePatient') }}" id="appointment-form" class="space-y-8" novalidate>
                @csrf

                {{-- Personal Information --}}
                <fieldset class="space-y-6">
                    <legend class="w-full pb-3 border-b border-black/5 flex items-center gap-2 text-xl font-semibold text-slate-900">
                        {{-- User icon --}}
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.118a7.5 7.5 0 0 1 15 0A18.006 18.006 0 0 1 12 21.75c-2.676 0-5.216-.584-7.5-1.632Z" />
                        </svg>
                        Personal Information
                    </legend>

                    {{-- Name Row --}}
                    <div class="grid md:grid-cols-3 gap-4">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-slate-700 mb-1">
                                First Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   id="first_name"
                                   name="first_name"
                                   value="{{ old('first_name') }}"
                                   required
                                   maxlength="30"
                                   aria-describedby="first_name-error"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-2 bg-white focus:ring-2 focus:ring-green-400 focus:outline-none @error('first_name') border-red-500 @enderror"
                                   placeholder="First Name">
                            @error('first_name')
                                <p id="first_name-error" class="text-red-500 text-sm mt-1" role="alert">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="middle_name" class="block text-sm font-medium text-slate-700 mb-1">
                                Middle Name
                            </label>
                            <input type="text"
                                   id="middle_name"
                                   name="middle_name"
                                   value="{{ old('middle_name') }}"
                                   maxlength="30"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-2 bg-white focus:ring-2 focus:ring-green-400 focus:outline-none"
                                   placeholder="Middle Name">
                        </div>

                        <div>
                            <label for="last_name" class="block text-sm font-medium text-slate-700 mb-1">
                                Last Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   id="last_name"
                                   name="last_name"
                                   value="{{ old('last_name') }}"
                                   required
                                   maxlength="30"
                                   aria-describedby="last_name-error"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-2 bg-white focus:ring-2 focus:ring-green-400 focus:outline-none @error('last_name') border-red-500 @enderror"
                                   placeholder="Last Name">
                            @error('last_name')
                                <p id="last_name-error" class="text-red-500 text-sm mt-1" role="alert">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- DOB + Gender --}}
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label for="date_of_birth" class="block text-sm font-medium text-slate-700 mb-1">
                                Date of Birth <span class="text-red-500">*</span>
                            </label>
                            <input type="date"
                                   id="date_of_birth"
                                   name="date_of_birth"
                                   value="{{ old('date_of_birth') }}"
                                   max="{{ date('Y-m-d', strtotime('-1 day')) }}"
                                   required
                                   aria-describedby="date_of_birth-error date_of_birth-help"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-2 bg-white focus:ring-2 focus:ring-green-400 focus:outline-none @error('date_of_birth') border-red-500 @enderror">
                            <p id="date_of_birth-help" class="text-xs text-slate-500 mt-1">Must be a past date</p>
                            @error('date_of_birth')
                                <p id="date_of_birth-error" class="text-red-500 text-sm mt-1" role="alert">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="gender" class="block text-sm font-medium text-slate-700 mb-1">
                                Gender <span class="text-red-500">*</span>
                            </label>

                            {{-- Select wrapper (ensures dropdown arrow always shows) --}}
                            <div class="relative">
                                <select id="gender"
                                        name="gender"
                                        required
                                        aria-describedby="gender-error"
                                        class="w-full appearance-none border border-gray-200 rounded-xl px-4 py-2 pr-10 bg-white focus:ring-2 focus:ring-green-400 focus:outline-none @error('gender') border-red-500 @enderror">
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>

                                {{-- Chevron down --}}
                                <svg class="w-5 h-5 text-slate-400 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none"
                                    fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>

                            @error('gender')
                                <p id="gender-error" class="text-red-500 text-sm mt-1" role="alert">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </fieldset>


                {{-- Contact Details --}}
                <fieldset class="space-y-6 border-t border-black/5 pt-6">
                    <legend class="w-full pb-3 border-b border-black/5 flex items-center gap-2 text-xl font-semibold text-slate-900">
                        {{-- Phone icon --}}
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h1.5a2.25 2.25 0 0 0 2.25-2.25v-1.372a1.125 1.125 0 0 0-.852-1.091l-4.423-1.106a1.125 1.125 0 0 0-1.173.417l-.97 1.293a1.125 1.125 0 0 1-1.21.38 12.035 12.035 0 0 1-7.143-7.143 1.125 1.125 0 0 1 .38-1.21l1.293-.97a1.125 1.125 0 0 0 .417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>
                        Contact Details
                    </legend>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-slate-700 mb-1">
                                Phone
                            </label>
                            <input type="tel"
                                   id="phone"
                                   name="phone"
                                   value="{{ old('phone') }}"
                                   pattern="09[0-9]{9}|[0-9]{11}"
                                   maxlength="13"
                                   aria-describedby="phone-help phone-error"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-2 bg-white focus:ring-2 focus:ring-green-400 focus:outline-none @error('phone') border-red-500 @enderror"
                                   placeholder="09XXXXXXXXX">
                            <p id="phone-help" class="text-xs text-slate-500 mt-1">Format: 09XXXXXXXXX (11 digits)</p>
                            @error('phone')
                                <p id="phone-error" class="text-red-500 text-sm mt-1" role="alert">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700 mb-1">
                                Email
                            </label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   maxlength="30"
                                   aria-describedby="email-error"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-2 bg-white focus:ring-2 focus:ring-green-400 focus:outline-none @error('email') border-red-500 @enderror"
                                   placeholder="example@email.com">
                            @error('email')
                                <p id="email-error" class="text-red-500 text-sm mt-1" role="alert">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-slate-700 mb-1">
                            Address
                        </label>
                        <input type="text"
                               id="address"
                               name="address"
                               value="{{ old('address') }}"
                               maxlength="50"
                               class="w-full border border-gray-200 rounded-xl px-4 py-2 bg-white focus:ring-2 focus:ring-green-400 focus:outline-none"
                               placeholder="Full Address">
                    </div>
                </fieldset>


                {{-- Appointment Details --}}
                <fieldset class="space-y-6 border-t border-black/5 pt-6">
                    <legend class="w-full pb-3 border-b border-black/5 flex items-center gap-2 text-xl font-semibold text-slate-900">
                        {{-- Calendar icon --}}
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z" />
                        </svg>
                        Appointment Details
                    </legend>

                    {{-- Service Selection --}}
                    <div>
                        <label for="service_id" class="block text-sm font-medium text-slate-700 mb-1">
                            Select Service <span class="text-red-500">*</span>
                        </label>

                        {{-- Select wrapper (fixes missing dropdown arrow) --}}
                        <div class="relative">
                            <select id="service_id"
                                    name="service_id"
                                    required
                                    aria-describedby="service_id-error service_id-help"
                                    class="w-full appearance-none border border-gray-200 rounded-xl px-4 py-2 pr-10 bg-white focus:ring-2 focus:ring-green-400 focus:outline-none @error('service_id') border-red-500 @enderror">
                                <option value="">-- Choose a Service --</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                        {{ ucfirst($service->name) }} — {{ $service->description }} ({{ $service->estimated_time }} min)
                                    </option>
                                @endforeach
                            </select>

                            {{-- Chevron down --}}
                            <svg class="w-5 h-5 text-slate-400 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none"
                                fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>

                        <p id="service_id-help" class="text-xs text-slate-500 mt-1">Select the service you need</p>
                        @error('service_id')
                            <p id="service_id-error" class="text-red-500 text-sm mt-2" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Schedule --}}
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900 mb-4">
                            Appointment Date & Time
                        </h3>

                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label for="schedule" class="block text-sm font-medium text-slate-700 mb-1">
                                    Date <span class="text-red-500">*</span>
                                </label>
                                <input type="date"
                                       id="schedule"
                                       name="schedule"
                                       value="{{ old('schedule') }}"
                                       min="{{ date('Y-m-d') }}"
                                       required
                                       aria-describedby="schedule-error schedule-help"
                                       class="w-full border border-gray-200 rounded-xl px-4 py-2 bg-white focus:ring-2 focus:ring-green-400 focus:outline-none @error('schedule') border-red-500 @enderror">
                                <p id="schedule-help" class="text-xs text-slate-500 mt-1">Select today or a future date</p>
                                @error('schedule')
                                    <p id="schedule-error" class="text-red-500 text-sm mt-1" role="alert">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="schedule_time" class="block text-sm font-medium text-slate-700 mb-1">
                                    Time <span class="text-red-500">*</span>
                                </label>
                                <input type="time"
                                       id="schedule_time"
                                       name="schedule_time"
                                       value="{{ old('schedule_time') }}"
                                       min="08:00"
                                       max="17:00"
                                       step="1800"
                                       required
                                       aria-describedby="schedule_time-error schedule_time-help"
                                       class="w-full border border-gray-200 rounded-xl px-4 py-2 bg-white focus:ring-2 focus:ring-green-400 focus:outline-none @error('schedule_time') border-red-500 @enderror">
                                <p id="schedule_time-help" class="text-xs text-slate-500 mt-1">Business hours: 8:00 AM - 5:00 PM</p>
                                @error('schedule_time')
                                    <p id="schedule_time-error" class="text-red-500 text-sm mt-1" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </fieldset>


                {{-- Submit --}}
                <div class="pt-2 text-center">
                    <button type="submit"
                            id="submit-btn"
                            class="inline-flex items-center justify-center gap-2 bg-green-600 text-white px-8 py-3 rounded-xl shadow-sm hover:bg-green-700 transition font-semibold disabled:opacity-50 disabled:cursor-not-allowed min-w-[180px] min-h-[44px]">
                        <span id="submit-text" class="inline-flex items-center gap-2">
                            {{-- Calendar check --}}
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.6"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m9 14.25 2.25 2.25L15 12.75" />
                            </svg>
                            Book Appointment
                        </span>

                        <span id="submit-spinner" class="hidden items-center gap-2">
                            <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Processing...
                        </span>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    // Form submission handling
    document.getElementById('appointment-form').addEventListener('submit', function() {
        const submitBtn = document.getElementById('submit-btn');
        const submitText = document.getElementById('submit-text');
        const submitSpinner = document.getElementById('submit-spinner');

        submitBtn.disabled = true;
        submitText.classList.add('hidden');
        submitSpinner.classList.remove('hidden');
        submitSpinner.classList.add('inline-flex');
    });

    // Real-time validation feedback
    const form = document.getElementById('appointment-form');
    const inputs = form.querySelectorAll('input, select');

    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (!this.validity.valid && this.value !== '') {
                this.classList.add('border-red-500');
            } else {
                this.classList.remove('border-red-500');
            }
        });

        input.addEventListener('input', function() {
            if (this.validity.valid) {
                this.classList.remove('border-red-500');
            }
        });
    });

    // Form auto-save to localStorage
    inputs.forEach(input => {
        const savedValue = localStorage.getItem(`appointment_${input.name}`);
        if (savedValue && !input.value) {
            input.value = savedValue;
        }

        input.addEventListener('change', function() {
            localStorage.setItem(`appointment_${input.name}`, this.value);
        });
    });

    // Clear localStorage on successful submission
    form.addEventListener('submit', function() {
        inputs.forEach(input => {
            localStorage.removeItem(`appointment_${input.name}`);
        });
    });
</script>

@endsection
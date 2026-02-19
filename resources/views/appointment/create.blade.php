@extends('welcome')

@section('title', 'Book Appointment')

@section('content')


<div class="min-h-screen bg-green-50 py-12 px-4">
    <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-2xl p-8 border border-green-100">

        <!-- Title -->
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-green-700">
                Book an Appointment
            </h2>
            <p class="text-gray-500 mt-2">
                Please fill in your details to register and schedule your visit.
            </p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-700 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Messages -->
        @if($errors->any())
            <div class="mb-6 p-4 rounded-lg bg-red-100 text-red-700 border border-red-300">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('appointment.storePatient') }}" class="space-y-6">
            @csrf

            <!-- Name Row -->
            <div class="grid md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        First Name *
                    </label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-400 focus:outline-none"
                        placeholder="First Name">
                    @error('first_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Middle Name
                    </label>
                    <input type="text" name="middle_name" value="{{ old('middle_name') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-400 focus:outline-none"
                        placeholder="Middle Name">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Last Name *
                    </label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-400 focus:outline-none"
                        placeholder="Last Name">
                    @error('last_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- DOB + Gender -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Date of Birth
                    </label>
                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-400 focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Gender
                    </label>
                    <select name="gender"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-400 focus:outline-none">
                        <option value="">Select Gender</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Phone
                    </label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-400 focus:outline-none"
                        placeholder="09XXXXXXXXX">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Email
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-400 focus:outline-none"
                        placeholder="example@email.com">
                </div>
            </div>

            <!-- Address -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Address
                </label>
                <input type="text" name="address" value="{{ old('address') }}"
                    class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-400 focus:outline-none"
                    placeholder="Full Address">
            </div>
           <!-- ================= SERVICE SELECTION ================= -->
     <div class="border-t border-green-200 pt-6">
     <h3 class="text-xl font-semibold text-green-700 mb-4"> Select Service *</h3>
        <select name="service_id"
            class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-400 focus:outline-none">
            <option value="">-- Choose a Service --</option>
            @foreach($services as $service)
                <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                    {{ ucfirst($service->name) }} — {{ $service->description }} ({{ $service->estimated_time }} min)
                </option>
            @endforeach
        </select>

            @error('service_id')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Schedule Section -->
        <div class="border-t border-green-200 pt-6">
            <h3 class="text-xl font-semibold text-green-700 mb-4">
                Appointment date
            </h3>

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Date *
                    </label>
                    <input type="date" name="schedule"
                        value="{{ old('schedule') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-400 focus:outline-none">
                    @error('schedule')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Time *
                    </label>
                    <input type="time" name="schedule_time"
                        value="{{ old('schedule_time') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-400 focus:outline-none">
                    @error('schedule_time')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>



            <!-- Submit Button -->
            <div class="pt-4 text-center">
                <button type="submit"
                    class="bg-green-600 text-white px-8 py-3 rounded-xl shadow-md hover:bg-green-700 transition font-semibold">
                    Book Appointment
                </button>
            </div>

        </form>
    </div>
</div>

@endsection

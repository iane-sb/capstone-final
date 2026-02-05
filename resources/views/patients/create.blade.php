<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Optional: Tailwind / DaisyUI already in your project --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-3xl bg-white p-6 rounded-lg shadow-md">

        <h1 class="text-2xl font-bold mb-6 text-center">
            Public Health Clinic – Patient Registration
        </h1>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Summary --}}
        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('patients.store') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- First Name --}}
                <div>
                    <label class="block font-medium mb-1">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}"
                        class="w-full border rounded p-2">
                </div>

                {{-- Middle Name --}}
                <div>
                    <label class="block font-medium mb-1">Middle Name</label>
                    <input type="text" name="middle_name" value="{{ old('middle_name') }}"
                        class="w-full border rounded p-2">
                </div>

                {{-- Last Name --}}
                <div>
                    <label class="block font-medium mb-1">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}"
                        class="w-full border rounded p-2">
                </div>

                {{-- Date of Birth --}}
                <div>
                    <label class="block font-medium mb-1">Date of Birth</label>
                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"
                        class="w-full border rounded p-2">
                </div>

                {{-- Gender --}}
                <div>
                    <label class="block font-medium mb-1">Gender</label>
                    <select name="gender" class="w-full border rounded p-2">
                        <option value="">Select Gender</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                {{-- Phone --}}
                <div>
                    <label class="block font-medium mb-1">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        class="w-full border rounded p-2">
                </div>

                {{-- Email --}}
                <div>
                    <label class="block font-medium mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full border rounded p-2">
                </div>

                {{-- Address --}}
                <div class="md:col-span-2">
                    <label class="block font-medium mb-1">Address</label>
                    <textarea name="address" rows="2"
                        class="w-full border rounded p-2">{{ old('address') }}</textarea>
                </div>

                {{-- Patient Number --}}
                <div class="md:col-span-2">
                    <label class="block font-medium mb-1">Patient Number</label>
                    <input type="text" name="patient_number" value="{{ old('patient_number') }}"
                        class="w-full border rounded p-2">
                </div>

            </div>

            <div class="mt-6 flex justify-center">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Register Patient
                </button>
            </div>
        </form>

    </div>

</body>
</html>

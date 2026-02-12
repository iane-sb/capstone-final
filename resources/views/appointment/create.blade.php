@extends('welcome')

@section('title', 'Book Appointment')

@section('content')


@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif


@if($errors->any())
    <ul style="color: red">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('appointment.storePatient') }}">
    @csrf

    <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First Name">
    @error('first_name') <small>{{ $message }}</small> @enderror <br></br>

    <input type="text" name="middle_name" value="{{ old('middle_name') }}" placeholder="Middle Name"><br></br>

    <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
    @error('last_name') <small>{{ $message }}</small> @enderror <br></br>

    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"> <br></br>

    <select name="gender">
        <option value="">Select Gender</option>
        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
    </select><br></br>

    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone"> <br></br>
    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"> <br></br>

    <input type="text" name="address" value="{{ old('address') }}" placeholder="Address"> <br></br>
    <input type="text" name="patient_number" value="{{ old('patient_number') }}" placeholder="Patient Number"> <br></br>

    <button type="submit">Register Patient</button>
</form>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif


</body>
</html>
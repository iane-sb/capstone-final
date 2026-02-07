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

<form method="POST" action="/appointments">
    @csrf

    <label>First Name</label><br>
    <input type="text" name="first_name" value="{{ old('first_name') }}"><br><br>

    <label>Middle Name</label><br>
    <input type="text" name="middle_name" value="{{ old('middle_name') }}"><br><br>

    <label>Last Name</label><br>
    <input type="text" name="last_name" value="{{ old('last_name') }}"><br><br>

    <label>Date of Birth</label><br>
    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"><br><br>
    
    <label>Gender</label><br>
     <select name="gender">
        <option value="">Select Gender</option>

        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>
            Male
        </option>

        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
            Female
        </option>

        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>
            Other
        </option>
    </select><br><br>

    <label>Phone</label><br>
    <input type="tel" name="phone" value="{{ old('phone') }}"><br><br>

    <label>Email</label><br>
    <input type="email" name="email" value="{{ old('email') }}"><br><br>

    {{-- <label>Address</label><br>
    <input type="text" name="address" value="{{ old('address') }}"><br><br> --}}

    <button type="submit">Book Appointment</button>
</form>

</body>
</html>
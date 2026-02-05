@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Patient Registration</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('patients.store') }}">
        @csrf

        <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
        <input type="text" name="contact" placeholder="Contact Number" value="{{ old('contact') }}" required>
        <input type="text" name="address" placeholder="Address" value="{{ old('address') }}" required>

        <button type="submit">Register Patient</button>
    </form>
</div>
@endsection

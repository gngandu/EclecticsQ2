@extends('layouts.app')

@section('content')
<h1>Edit Customer</h1>

<form method="POST" action="{{ route('customers.update', $customer->id) }}">
    @csrf
    @method('PUT')
    
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ old('name', $customer->name) }}" required>

    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ old('email', $customer->email) }}" required>

    <label for="dob">Date of Birth:</label>
    <input type="date" name="dob" value="{{ old('dob', $customer->dob) }}" required>

    <label for="phone_number">Phone Number:</label>
    <input type="text" name="phone_number" value="{{ old('phone_number', $customer->phone_number) }}" required>

    <label for="id_number">ID Number:</label>
    <input type="text" name="id_number" value="{{ old('id_number', $customer->id_number) }}" required>

    <label for="address">Address:</label>
    <textarea name="address" required>{{ old('address', $customer->address) }}</textarea>

    <button type="submit">Update Customer</button>
</form>
@endsection

@extends('layouts.app')

@section('content')
<h1>Create Loan Product</h1>

<form method="POST" action="{{ route('loan-products.store') }}">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ old('name') }}" required>

    <label for="code">code:</label>
    <input type="text" name="code" value="{{ old('code') }}" required>

    <label for="min_amount">min_amount:</label>
    <input type="text" name="min_amount" value="{{ old('min_amount') }}" required>

    <label for="phone_number">max_amount:</label>
    <input type="text" name="max_amount" value="{{ old('max_amount') }}" required>

    <label for="id_number">interest rate:</label>
    <input type="text" name="interest_rate" value="{{ old('interest_rate') }}" required>

    <label for="currency">currency:</label>
    <textarea name="currency" required>{{ old('currency') }}</textarea>

    <button type="submit">Create Product</button>
</form>
@endsection



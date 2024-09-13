@extends('layouts.app')

@section('content')
<h1>Edit Loan Product</h1>

<form method="POST" action="{{ route('loan-products.update', product->id) }}">
    @csrf
    @method('PUT')
    
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ old('name', product->name) }}" required>

    <label for="code">Code:</label>
    <input type="text" name="code" value="{{ old('code', product->code) }}" required>

    <label for="min_amount">min_amount:</label>
    <input type="text" name="min_amount" value="{{ old('min_amount', product->min_amount) }}" required>

    <label for="max_amount">max_amount:</label>
    <input type="text" name="max_amount" value="{{ old('max_amount', product->max_amount) }}" required>

    <label for="interest_rate">interest_rate:</label>
    <input type="text" name="interest_rate" value="{{ old('interest_rate', product->interest_rate) }}" required>

    <label for="currency">currency:</label>
    <textarea name="currency" required>{{ old('currency', product->currency) }}</textarea>

    <button type="submit">Update Product</button>
</form>
@endsection

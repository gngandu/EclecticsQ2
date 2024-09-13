@extends('layouts.app')

@section('content')
<h1>Apply for a Loan</h1>

<form method="POST" action="{{ route('loans.store') }}">
    @csrf

    <label for="customer_id">Customer:</label>
    <select name="customer_id" required>
        @foreach($customers as $customer)
        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
        @endforeach
    </select>

    <label for="product_id">Loan Product:</label>
    <select name="product_id" required>
        @foreach($products as $product)
        <option value="{{ $product->id }}">{{ $product->name }} (Min: {{ $product->min_amount }}, Max: {{ $product->max_amount }})</option>
        @endforeach
    </select>

    <label for="amount_applied">Loan Amount:</label>
    <input type="number" name="amount_applied" min="0" required>

    <button type="submit">Apply</button>
</form>
@endsection


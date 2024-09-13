@extends('layouts.app')

@section('content')
<h1>Products List</h1>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Min amt</th>
            <th>Max amt</th>
            <th>Interest Rate</th>
            <th>Currency</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($loanProducts as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->code }}</td>
            <td>{{ $product->min_amount }}</td>
            <td>{{ $product->max_amount }}</td>
            <td>{{ $product->interest_rate }}</td>
            <td>{{ $product->currency }}</td>
            <td>
                <a href="{{ route('loan-products.edit', $product->id) }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('loan-products.create') }}">Create New Product</a>
@endsection



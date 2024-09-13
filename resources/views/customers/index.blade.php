@extends('layouts.app')

@section('content')
<h1>Customers List</h1>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Phone Number</th>
            <th>ID Number</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->dob }}</td>
            <td>{{ $customer->phone_number }}</td>
            <td>{{ $customer->id_number }}</td>
            <td>{{ $customer->address }}</td>
            <td>
                <a href="{{ route('customers.edit', $customer->id) }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('customers.create') }}">Create New Customer</a>
@endsection

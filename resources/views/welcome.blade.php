@extends('layouts.app')

@section('content')
    <h1>Loan Management System</h1>
    
    <ul>
        <li>
            <a href="{{ route('customers.index') }}">Manage Customers</a>
        </li>
        <li>
            <a href="{{ route('loan-products.index') }}">Manage Loan Products</a>
        </li>
        <li>
            <a href="{{ route('loans.create') }}">Create Loan</a>
        </li>
        <li>
            <a href="{{ route('loans.index') }}">Manage Loans</a>
        </li>
        <li>
            <a href="{{ url('loan-report') }}">Loan Reports</a>
        </li>
    </ul>
@endsection

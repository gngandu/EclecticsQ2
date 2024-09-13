<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Management System</title>
</head>
<body>
    <header>
        <nav>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('customers.index') }}">Customers</a>
            <a href="{{ route('loan-products.index') }}">Loan Products</a>
            <a href="{{ route('loans.create') }}">Apply Loan</a>
            <a href="{{ route('loans.index') }}">Loans</a>
            <a href="{{ url('loan-report') }}">Reports</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Loan Management System</p>
    </footer>
</body>
</html>

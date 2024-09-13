@extends('layouts.app')

@section('content')
<h1>Loan Applications</h1>

<table>
    <thead>
        <tr>
            <th>Customer</th>
            <th>Product</th>
            <th>Amount Applied</th>
            <th>Amount Disbursed</th>
            <th>Amount Repaid</th>
            <th>Balance</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($loans as $loan)
        <tr>
            <td>{{ $loan->customer->name }}</td>
            <td>{{ $loan->product->name }}</td>
            <td>{{ $loan->amount_applied }}</td>
            <td>{{ $loan->amount_disbursed ?? 'N/A' }}</td>
            <td>{{ $loan->amount_repaid ?? 0 }}</td>
            <td>{{ $loan->balance }}</td>
            <td>{{ $loan->status }}</td>
            <td>
                @if($loan->status == 'pending')
                <form method="POST" action="{{ route('loans.approve', $loan->id) }}">
                    @csrf
                    <button type="submit">Approve</button>
                </form>
                @endif

                @if($loan->status == 'approved')
                <form method="POST" action="{{ route('loans.disburse', $loan->id) }}">
                    @csrf
                    <button type="submit">Disburse</button>
                </form>
                @endif

                @if($loan->status == 'disbursed')
                <form method="POST" action="{{ route('loans.repay', $loan->id) }}">
                    @csrf
                    <input type="number" name="amount_repaid" min="0" placeholder="Repayment amount" required>
                    <button type="submit">Repay</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

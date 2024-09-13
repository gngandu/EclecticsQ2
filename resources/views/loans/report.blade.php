
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
        </tr>
    </thead>
    <tbody>
        @foreach($loans as $loan)
        <tr>
            <td>{{ $loan->customer->name }}</td>
            <td>{{ $loan->product->name }}</td>
            <td>{{ $loan->amount_applied }}</td>
            <td>{{ $loan->amount_disbursed }}</td>
            <td>{{ $loan->amount_repaid }}</td>
            <td>{{ $loan->balance }}</td>
            <td>{{ $loan->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>



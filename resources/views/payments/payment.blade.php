@extends('layouts.simple')

@section('title', 'Payments')

@section('content')
<h1>Payment Records</h1>

<table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Rice Name</th>
            <th>Quantity</th>
            <th>Total Amount</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->menu->rice_name ?? 'N/A' }}</td>
            <td>{{ $order->quantity }}</td>
            <td>${{ number_format($order->total_amount, 2) }}</td>
            <td>
                @if($order->payment)
                    {{ ucfirst($order->payment->status) }}
                @else
                    <span style="color:orange;">Pending</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
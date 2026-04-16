@extends('layouts.simple')

@section('title', 'Orders')

@section('content')
<h1>Orders</h1>

<!-- New Order Form -->
<form action="{{ route('order.store') }}" method="POST">
    @csrf
    <div style="display:grid; grid-template-columns:2fr 1fr auto; gap:10px; margin-bottom:20px;">
        <select name="menu_id" required>
            <option value="">Select Rice</option>
            @foreach($sets as $menu)
                <option value="{{ $menu->id }}">{{ $menu->rice_name }} (${{ number_format($menu->price, 2) }})</option>
            @endforeach
        </select>
        <input type="number" name="quantity" placeholder="Quantity" min="1" required>
        <button type="submit" class="btn btn-primary">Place Order</button>
    </div>
</form>

<!-- Orders Table -->
<table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Rice Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Amount</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lists as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->menu->rice_name }}</td>
            <td>{{ $order->quantity }}</td>
            <td>${{ number_format($order->menu->price, 2) }}</td>
            <td>${{ number_format($order->total_amount, 2) }}</td>
            <td>
                <a href="{{ route('order.edit', $order->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('order.destroy', $order->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this order?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
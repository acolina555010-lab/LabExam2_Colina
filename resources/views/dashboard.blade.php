@extends('layouts.simple')

@section('title', 'Rice Menu Management')

@section('content')
<h1>Rice Menu</h1>

<!-- Add New Rice Form -->
<form action="{{ route('menu.store') }}" method="POST">
    @csrf
    <div style="display:grid; grid-template-columns:1fr 1fr 1fr 1fr auto; gap:10px; margin-bottom:20px;">
        <input type="text" name="rice_name" placeholder="Rice Name" required>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <input type="number" name="stock_quantity" placeholder="Stock Quantity" required>
        <input type="text" name="description" placeholder="Description">
        <button type="submit" class="btn btn-primary">Add Rice</button>
    </div>
</form>

<!-- Rice List Table -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Rice Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rices as $rice)
        <tr>
            <td>{{ $rice->id }}</td>
            <td>{{ $rice->rice_name }}</td>
            <td>${{ number_format($rice->price, 2) }}</td>
            <td>{{ $rice->stock_quantity }}</td>
            <td>{{ $rice->description }}</td>
            <td>
                <a href="{{ route('menu.edit', $rice->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('menu.destroy', $rice->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this rice?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
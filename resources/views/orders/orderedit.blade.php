@extends('layouts.simple')

@section('title', 'Edit Order')

@section('content')
<h1>Edit Order #{{ $lists->id }}</h1>

<form action="{{ route('order.update', $lists->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Rice</label>
        <select name="menu_id" required>
            @foreach($sets as $menu)
                <option value="{{ $menu->id }}" {{ $lists->menu_id == $menu->id ? 'selected' : '' }}>
                    {{ $menu->rice_name }} (${{ number_format($menu->price, 2) }})
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Quantity</label>
        <input type="number" name="quantity" value="{{ $lists->quantity }}" min="1" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Order</button>
    <a href="{{ route('order') }}" class="btn" style="background:#6c757d; color:white;">Cancel</a>
</form>
@endsection
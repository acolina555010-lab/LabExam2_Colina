@extends('layouts.simple')

@section('title', 'Edit Rice')

@section('content')
<h1>Edit Rice: {{ $menu->rice_name }}</h1>

<form action="{{ route('menu.update', $menu->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Rice Name</label>
        <input type="text" name="rice_name" value="{{ $menu->rice_name }}" required>
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="number" step="0.01" name="price" value="{{ $menu->price }}" required>
    </div>
    <div class="form-group">
        <label>Stock Quantity</label>
        <input type="number" name="stock_quantity" value="{{ $menu->stock_quantity }}" required>
    </div>
    <div class="form-group">
        <label>Description</label>
        <input type="text" name="description" value="{{ $menu->description }}">
    </div>
    <button type="submit" class="btn btn-primary">Update Rice</button>
    <a href="{{ route('dashboard') }}" class="btn" style="background:#6c757d; color:white;">Cancel</a>
</form>
@endsection
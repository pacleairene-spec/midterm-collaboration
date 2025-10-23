@extends('layouts.app')

@section('content')
<h2>Edit Item</h2>
<form action="{{ route('items.update', $item) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="{{ $item->name }}" class="form-control">
    </div>
    <div class="mb-3">
        <label>Quantity</label>
        <input type="number" name="quantity" value="{{ $item->quantity }}" class="form-control">
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input type="text" name="price" value="{{ $item->price }}" class="form-control">
    </div>
    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-control">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection

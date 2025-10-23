@extends('layouts.app')

@section('content')
<h2>Add Item</h2>
<form action="{{ route('items.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
        <label>Quantity</label>
        <input type="number" name="quantity" class="form-control">
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input type="text" name="price" class="form-control">
    </div>
    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-control">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-success">Save</button>
</form>
@endsection

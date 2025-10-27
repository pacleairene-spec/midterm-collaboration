## Project Title  
**Inventory System**

## Description / Overview  
The **Inventory System** is a simple web-based application developed using the **Laravel Framework** for our Midterm Examination. It is designed to help users manage their inventory by organizing items under specific categories. The system uses two main database tables **Categories** and **Items** to record, display, and manage stock information efficiently.  

## Objectives  
- To apply **Laravel framework** in building a functional web-based system.  
- To demonstrate **Git and GitHub collaboration** for version control.  
- To perform **CRUD operations** (Create, Read, Update, Delete) on inventory data.  
- To organize items using category-based management.  
- To develop documentation using **Markdown syntax**.

## Features / Functionality  
- Add, edit, view, and delete **categories**.  
- Add, edit, view, and delete **items** under each category.  
- Displays a list of all items.  
- Organized database using relationships between tables.  
- Laravel MVC (Model-View-Controller) structure implementation.

## Installation Instructions

1\. Clone or download the project.

2\. Run \`composer install\` to install dependencies.

3\. Copy \`.env.example\` to \`.env\` and set up your database connection.

4\. Run \`php artisan migrate\` to create tables in the database.

5\. (Optional) Run \`php artisan db:seed\` to insert sample data.

6\. Start the local development server using \`php artisan serve\`.

7\. Open \`<http://127.0.0.1:8000\`> in your browser.

## Usage

- Open the web app in your browser.

- Create a new Category (e.g., Electronics, School Supplies).

- Add Items under each category with name, quantity, and price.

- Update or delete items and categories as needed.

- View all inventory records in the dashboard.

## Screenshots or Code Snippets
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Categories</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
    </div>

    <table class="table table-bordered text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th style="width: 10%">ID</th>
                <th style="width: 60%">Name</th>
                <th style="width: 30%"> </th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Items</h2>
        <a href="{{ route('items.create') }}" class="btn btn-success">Add Item</a>
    </div>

    <table class="table table-bordered text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th style="width: 8%">ID</th>
                <th style="width: 20%">Name</th>
                <th style="width: 12%">Quantity</th>
                <th style="width: 15%">Price</th>
                <th style="width: 25%">Category</th>
                <th style="width: 20%"> </th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>₱{{ number_format($item->price, 2) }}</td>
                <td>{{ $item->category->name }}</td>
                <td>
                    <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this item?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

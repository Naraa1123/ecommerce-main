@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Category</label>
            <select name="category_id">
                <option value="">Сонгох</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>Price</label>
            <input type="number" name="price">
        </div>
        <div>
            <label>Stock</label>
            <input type="number" name="stock">
        </div>
        <div>
            <label>Description</label>
            <textarea name="description" rows="3"></textarea>
        </div>
        <div>
            <label>Image</label>
            <input type="file" name="image">
        </div>
        <button type="submit">Save</button>


    </form>
@endsection

@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.product.update',['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label>Category</label>
            <select name="category_id">
                <option value="">Сонгох</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{$product->name}}">
        </div>
        <div>
            <label>Price</label>
            <input type="number" name="price" value="{{$product->price}}">
        </div>
        <div>
            <label>Stock</label>
            <input type="number" name="stock" value="{{$product->stock}}">
        </div>
        <div>
            <label>Description</label>
            <textarea name="description" rows="3">{{ $product->description }}</textarea>
        </div>
        <div>
            <label>Image</label>
            @if($product->image)
                <img src="{{ Storage::url($product->image) }}" class="w-24 h-24 rounded object-cover mb-2">
            @endif
            <input type="file" name="image">
        </div>
        <button type="submit">Update</button>


    </form>
@endsection

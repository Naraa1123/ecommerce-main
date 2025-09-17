@extends('layouts.admin')

@section('content')
    <h1>This is Products</h1>
    <a href="{{ route('admin.product.create') }}">Create Product</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Категори</th>
                <th>Барааны нэр</th>
                <th>Үнэ</th>
                <th>Үлдэгдэл</th>
                <th>Үйлдэл</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr class="text-center">
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <div class="flex flex-row gap-2">
                            <a href="#" class="px-3 py-1.5 rounded-md border text-sm hover:bg-gray-50 hover:text-black">Show</a>
                            <a href="{{ route('admin.product.edit',[ 'id' => $product->id ]) }}" class="px-3 py-1.5 rounded-md border text-sm hover:bg-gray-50 hover:text-black">Edit</a>
                            <form action="{{ route('admin.product.delete',['id'=>$product->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 rounded-md border text-sm hover:bg-gray-50 hover:text-black">Delete</button>
                            </form>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Одоогоор бараа байхгүй байна</td>
                </tr>
            @endforelse
        </tbody>

    </table>
@endsection

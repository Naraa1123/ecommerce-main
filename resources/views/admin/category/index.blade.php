@extends('layouts.admin')

@section('content')
    <a href="/admin/categories/create" class="padding-4 text-black bg-white mb-3 mt-3 inline">Create Category</a>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">#</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Нэр</th>
                <th class="px-4 py-2 text-right text-sm font-medium text-gray-700">Үйлдэл</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
            @forelse ($categories as $category)
                <tr>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $category->id }}</td>
                    <td class="px-4 py-2">
                        <p class="text-blue-600 hover:underline">{{ $category->name }}</p>
                    </td>
                    <td class="px-4 py-2">
                        <div class="flex items-center justify-end gap-2">
                            <a href="/admin/categories/{{ $category->id }}/edit" class="px-3 py-1.5 rounded-md border border-gray-300 hover:bg-gray-50 text-sm">Засах</a>
                            <form action="/admin/categories/{{ $category->id }}" method="POST" onsubmit="return confirm('Устгах уу?')">
                                @csrf @method('DELETE')
                                <button class="px-3 py-1.5 rounded-md bg-red-600 text-white text-sm">Устгах</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-sm text-gray-500">Одоогоор категори алга.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <form action="/admin/categories/{{ $category->id }}" method="POST" class="bg-white rounded-lg shadow p-6 space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Нэр</label>
            <input id="name" name="name" type="text"
                   value="{{ old('name', $category->name) }}"
                   class="mt-1 w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                   required>
            @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-3">
            <button class="px-4 py-2 rounded-md bg-blue-600 text-white">Шинэчлэх</button>
            <a href="/admin/categories" class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-50">Буцах</a>
        </div>
    </form>
@endsection

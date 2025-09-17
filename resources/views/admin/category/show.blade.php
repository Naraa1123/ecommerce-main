@extends('layouts.admin')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <div class="text-sm text-gray-500 mb-2">ID: {{ $category->id }}</div>
        <div class="text-lg font-semibold">{{ $category->name }}</div>

        <div class="mt-4 flex items-center gap-3">
            <a href="/categories/{{ $category->id }}/edit" class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-50">Засах</a>
            <a href="/categories" class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-50">Буцах</a>
        </div>
    </div>
@endsection

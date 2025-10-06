@extends('layouts.admin')

@section('content')
    <div class="max-w-4xl mx-4 p-4 rounded-md shadow">
        <div class="flex items-start justify-between mb-4">
            <div>
                <h2 class="text-xl font-semibold">Захиалгийн дугаар #{{ $order->id }}</h2>
                <div class="text-sm">Захиалагч: {{ $order->user->name }}</div>
                <div class="text-sm">Захиалга үүссэн огноо: {{ $order->created_at }}</div>
            </div>
            <div class="text-right">
                <div class="mb-2 text-lg font-semibold">
                    {{ number_format($order->subtotal) }} ₮
                </div>

                @if($order->status !== 'paid')
                    <form action="{{ route('admin.order.markPaid', ['id' => $order->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 rounded bg-blue-500 text-white">Төлбөр төлсөн</button>
                    </form>
                @else
                    <span class="inline-block px-3 py-1 rounded bg-green-100 text-green-700">Төлөгдсөн</span>
                @endif
            </div>
        </div>
    </div>
    <table class="w-full divide-y divide-gray-200 mb-2">
        <thead>
            <tr>
                <th class="px-4 py-2 text-center text-sm text-gray-700">Барааны нэр</th>
                <th class="px-4 py-2 text-center text-sm text-gray-700">Үнэ</th>
                <th class="px-4 py-2 text-center text-sm text-gray-700">Тоо хэмжээ</th>
                <th class="px-4 py-2 text-center text-sm text-gray-700">Нийт</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                    @php
                        $subtotal = $item->unit_price * $item->quantity;
                    @endphp
                <tr>
                    <td class="px-4 py-3 text-sm text-center">{{ $item->product->name }}</td>
                    <td class="px-4 py-3 text-sm text-center">{{ $item->unit_price }}</td>
                    <td class="px-4 py-3 text-sm text-center">{{ $item->quantity }}</td>
                    <td class="px-4 py-3 text-sm text-center">{{ $subtotal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

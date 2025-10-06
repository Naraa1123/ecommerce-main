@extends('layouts.admin')

@section('content')
    <h1>This is Orders</h1>

    <table>
        <thead>
        <tr>
            <th>Захиалгийн id</th>
            <th>Захиалагч нэр</th>
            <th>Нийт дүн</th>
            <th>Төлөв</th>
            <th>Үйлдэл</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($orders as $order)
            <tr class="text-center">
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->subtotal }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    <div class="flex flex-row gap-2">
                        <a href="{{ route('admin.order.show', ['id' => $order->id]) }}" class="px-3 py-1.5 rounded-md border text-sm hover:bg-gray-50 hover:text-black">Дэлгэрэнгүй харах</a>
                        @if($order->status !== 'paid')
                            <form action="{{ route('admin.order.markPaid', ['id' => $order->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-3 py-1.5 rounded-md border text-sm hover:bg-gray-50 hover:text-black">Төлбөр төлсөн</button>
                            </form>
                            <a href="#" class="px-3 py-1.5 rounded-md border text-sm hover:bg-gray-50 hover:text-black">Төлбөр төлөөгүй</a>
                        @endif
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

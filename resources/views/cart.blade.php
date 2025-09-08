@extends('layouts.master')

@section('title')
CART
@endsection

@section('content')
    <h1>سلة المشتريات</h1>

    {{-- رسالة نجاح --}}
    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    @if($items->isEmpty())
        <p>السلة فارغة</p>
    @else
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>المنتج</th>
                    <th>السعر</th>
                    <th>الكمية</th>
                    <th>المجموع</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ number_format($item->price ?? $item->product->price,2) }}</td>
                        <td>
                            {{-- فورم لتحديث الكمية --}}
                            <form method="POST" action="{{ route('cart.update', $item->id) }}">
    @csrf
    @method('PUT')   <!-- مهم ليطابق route الـ PUT -->
    <input type="number" name="quantity" min="1" value="{{ $item->quantity }}">
    <button type="submit">تحديث</button>
</form>
                        </td>
                        <td>{{ number_format(($item->price ?? $item->product->price) * $item->quantity,2) }}</td>
                        <td>
                            {{-- فورم لحذف المنتج --}}
                            <form method="POST" action="{{ route('cart.remove', $item->id) }}">
    @csrf
    <button type="submit">حذف</button>
</form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p><strong>المجموع الفرعي: </strong>{{ number_format($subtotal,2) }}</p>
    @endif
@endsection


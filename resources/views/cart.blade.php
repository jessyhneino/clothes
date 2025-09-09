@extends('layouts.master')

@section('title')
CART
@endsection

@section('content')
    <h1 class="cart-title"> Procurement basket 🛒 </h1>

    {{-- رسالة نجاح --}}
    @if(session('success'))
        <p class="success-msg">{{ session('success') }}</p>
    @endif

    @if($items->isEmpty())
        <p class="empty-cart">السلة فارغة</p>
    @else
        <div class="cart-container">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Product number</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Procedures</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->product->id }}</td>
                            <td>{{ number_format($item->price ?? $item->product->price,2) }}</td>
                            <td>
                                {{-- فورم لتحديث الكمية --}}
                                <form method="POST" action="{{ route('cart.update', $item->id) }}" class="qty-form">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" min="1" value="{{ $item->quantity }}" class="qty-input">
                                    <button type="submit" class="btn btn-update">Update</button>
                                </form>
                            </td>
                            <td>{{ number_format(($item->price ?? $item->product->price) * $item->quantity,2) }}</td>
                            <td>
                                {{-- فورم لحذف المنتج --}}
                                <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-remove">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="back-cart">
                
                <p class="subtotal"><strong> The final total: </strong>{{ number_format($subtotal,2) }}</p>
                <a class="back-a" href="/cards"> Return to product </a>
                
            </div>
        </div>
    @endif
@endsection


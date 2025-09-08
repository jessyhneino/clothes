<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;


use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $query = Cart::queryForCurrent()->with('product');
        $items = $query->get();
        $subtotal = $items->sum(fn($i) => ($i->price ?? $i->product->price) * $i->quantity);

        return view('cart', compact('items', 'subtotal'));
    }

    // إضافة منتج
    public function store(Request $request)
    {
    $request->validate([
        'product_id' => 'required|integer|exists:categories,id',
        'quantity'   => 'sometimes|integer|min:1'
    ]);

    $product = Category::findOrFail($request->product_id);
    $qty = max(1, (int) ($request->quantity ?? 1));

    $userId = auth()->check() ? auth()->id() : null;
    $sessionId = auth()->check() ? null : session()->getId();

    $existing = Cart::queryForCurrent()->where('product_id', $product->id)->first();

    if ($existing) {
        $newQty = $existing->quantity + $qty;
        if (isset($product->stock)) {
            $newQty = min($newQty, $product->stock);
        }
        $existing->update(['quantity' => $newQty]);
    } else {
        Cart::create([
            'user_id'    => $userId,
            'session_id' => $sessionId,
            'product_id' => $product->id,
            'quantity'   => $qty,
            'price'      => $product->price,
        ]);
    }

    // إرسال JSON للـ AJAX
    return response()->json([
        'success' => true,
        'cart_count' => Cart::queryForCurrent()->sum('quantity'),
        'redirect_url' => route('cart.index') // عنوان صفحة السلة
    ]);
    }

    // تحديث كمية منتج
    public function update(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);
        $item = Cart::queryForCurrent()->where('id', $id)->firstOrFail();
        $item->update(['quantity' => $request->quantity]);

        return redirect()->route('cart.index')->with('success', 'تم تحديث الكمية');
    }

    // إزالة منتج
    public function remove($id)
    {
        $item = Cart::queryForCurrent()->where('id', $id)->firstOrFail();
        $item->delete();

        return redirect()->route('cart.index')->with('success', 'تم حذف المنتج من السلة');
    }


    public function clear()
    {
        Cart::queryForCurrent()->delete();
        return response()->json(['success' => true]);
    }
}

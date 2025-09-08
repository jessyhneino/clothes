<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id','session_id','product_id','quantity','price'];

 public function product()
{
    return $this->belongsTo(Category::class, 'product_id'); // product_id في جدول cart_items
}

public function user()
{
return $this->belongsTo(User::class);
}


public static function queryForCurrent()
{
if (auth()->check()) {
return self::where('user_id', auth()->id());
}
return self::where('session_id', session()->getId());
}


public static function countForCurrent()
{
return self::queryForCurrent()->sum('quantity');
}

 public static function add($productId, $quantity = 1, $userId = null)
    {
        return self::create([
            'product_id' => $productId,
            'quantity' => $quantity,
            'user_id' => $userId ?? auth()->id(),
        ]);
    }

}

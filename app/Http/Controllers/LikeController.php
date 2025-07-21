<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    // public function store (Request $request){

        
    // $userId = auth()->id();
    // $categoryId = $request->category_id;

    // // تحقق أولاً إذا كان المستخدم قد أعجب بهذه الفئة مسبقًا
    // $alreadyLiked = Like::where('user_id', $userId)
    //                     ->where('category_id', $categoryId)
    //                     ->exists();

    // if (!$alreadyLiked) {
    //     Like::create([
    //         'user_id' => $userId,
    //         'category_id' => $categoryId,
    //     ]);
    // }
    // return redirect()->route('cards');
    // }

    public function store(Request $request)
    {
        $userId = auth()->id();
        $categoryId = $request->category_id;

        // البحث عن الإعجاب الحالي
        $like = Like::where('user_id', $userId)
                    ->where('category_id', $categoryId)
                    ->first();

        if ($like) {
            // إذا كان الإعجاب موجودًا، نحذفه
            $like->delete();
            $status = 'deleted';
        } else {
            // إذا لم يكن الإعجاب موجودًا، نضيفه
            Like::create([
                'user_id' => $userId,
                'category_id' => $categoryId,
            ]);
            $status = 'added';
        }

        return response()->json(['status' => $status]);
    }

    public function getLikedProducts()
        {
            $userId = auth()->id();
            $likedProducts = Like::where('user_id', $userId)->pluck('category_id');

            return response()->json($likedProducts);
        }

}

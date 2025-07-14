<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function comment($id){
        $products = Comment::find($id);
        return view('comment', compact('products'));
    }

    public function insertcom(Request $request){
        $userId = auth()->id();
        $categoryId = $request->category_id;

Comment::create([
    'comment' => $request->comment,
    'user_id' => $userId,
    'category_id' => $categoryId,
    // 'likes' => $request->likes,
    // 'user_id'=> auth()->id(),
]);
return redirect()->route('comment');
    }

    public function updatecom(Request $request, $id){
         $product = Comment::findorFail($id);
        $product->update([
            'comment'=>$request->comment,
            // 'user_id'=> auth()->id(),
            // 'category_id'=> auth()->id(),
        ]);
        return redirect()->route('comment');
    }

    public function deletecom($id){
        DB::table('comments')->where('id',$id)->delete();
        return redirect()->route('comment');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Productwinter;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function comment($id){
        $category = Category::with(['comments.user'])->findOrFail($id);
        return view('comment', compact('category'));
    }

    public function insertcom(Request $request){
        $request->validate([
            'comment' => 'required|string|max:1000',
            'category_id' => 'required|exists:categories,id'
        ]);

        Comment::create([
            'comment' => $request->comment,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
        ]);

        return redirect()->back()->with('success', 'تم إضافة التعليق بنجاح!');
    }

    public function updatecom(Request $request, $id){
        $request->validate([
            'comment' => 'required|string|max:1000'
        ]);

        $comment = Comment::findOrFail($id);
        
        if ($comment->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'لا يمكنك تعديل هذا التعليق');
        }

        $comment->update([
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'تم تحديث التعليق بنجاح!');
    }

    public function deletecom($id){
        $comment = Comment::findOrFail($id);
        
        if ($comment->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'لا يمكنك حذف هذا التعليق');
        }

        $comment->delete();
        return redirect()->back()->with('success', 'تم حذف التعليق بنجاح!');
    }
}

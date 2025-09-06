<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function home(){
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function dashboardTablecat(){
        $products = Product::all();
        return view('dashboardTablecat', compact('products'));
    }

    public function createpro(){
        return view('createpro');
    }

    public function editpro($id){
        // $product = DB::table('products')->where('id',$id)->first();
        $product = Product::findorFail($id);
        return view('editpro', compact('product'));
    }

    public function insertpro(Request $request){

        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = public_path('images'); // تحديد المسار داخل public
        $request->image->move($path, $file_name);
        $image_path = 'images/'.$file_name;

Product::create([
    'name' => $request->name,
    'image' => $image_path, // حفظ مسار الصورة
    // 'likes' => $request->likes,
    // 'user_id'=> auth()->id(),
]);
return redirect()->route('home');
    }

    public function updatepro(Request $request, $id){
        $product = Product::findOrFail($id);

    // تحقق إذا تم رفع صورة جديدة
    if ($request->hasFile('image')) {
        $file_extension = $request->file('image')->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = public_path('images');
        $request->file('image')->move($path, $file_name);
        $image_path = 'images/'.$file_name;

        // تحديث الصورة فقط إذا تم رفعها
        $product->image = $image_path;
    }

    // تحديث باقي البيانات
    $product->name = $request->name;
    $product->save();

    return redirect()->route('home');

    }

    public function deletepro($id){
        DB::table('products')->where('id',$id)->delete();
        return redirect()->route('home');

    }
}

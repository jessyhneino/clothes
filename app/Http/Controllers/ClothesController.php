<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ClothesController extends Controller
{
    public function home(){
        return view('home');
    }

    // public function cards(){
    //     return view('cards');
    // }

    public function cards(){
        // $products = DB::table('categories')->get();
        $products = Category::all();
        return view('cards', compact('products'));
    }

    public function create(){
        return view('create');
    }

    public function edit($id){
        $product = DB::table('categories')->where('id',$id)->first();
        return view('edit', compact('product'));
    }

    public function insert(Request $request){

        $file_extension = $request->image->getClientOriginalExtension();
$file_name = time().'.'.$file_extension;
$path = public_path('images'); // تحديد المسار داخل public
$request->image->move($path, $file_name);
$image_path = 'images/'.$file_name;

Category::create([
    'name_product' => $request->name_product,
    'price' => $request->price,
    'image' => $image_path, // حفظ مسار الصورة
    'description' => $request->description,
    'likes' => $request->likes,
]);


        // $file_extension = $request->image->getClientOriginalExtension();
        // $file_name = time().'.'.$file_extension;
        // $path = 'images';
        // $request->image->move($path, $file_name);
        // $file_name='images/'.$file_name;


        // DB::table('categories')->insert([
        //     'name_product'=>$request->name_product,
        //     'price'=>$request->price,
        //     'image'=>$request->image,
        //     'description'=>$request->description,
        // ]);

        // $product = new Category();
        // $product->name_product = $request->name_product;
        // $product->price = $request->price;
        // $product->image = $request->image;
        // $product->description = $request->description;
        // $product->save();

        // Category::create([
        //     'name_product' => $request->name_product,
        //     'price' => $request->price,
        //     'image' => $request->image,
        //     'description' => $request->description,
        // ]);
        return redirect()->route('cards');
    }

    public function update(Request $request, $id){
        DB::table('categories')->where('id',$id)->update([
            'name_product'=>$request->name_product,
            'price'=>$request->price,
            'image'=>$request->image,
            'description'=>$request->description,
            'likes'=>$request->likes,
        ]);
        // return response('تم');
        return redirect()->route('cards');
    }

    public function delete($id){
        DB::table('categories')->where('id',$id)->delete();
        return redirect()->route('cards');

    }


public function toggleLike(Request $request, $id)
{
    $category = Category::findOrFail($id);

    if ($request->liked == 'true') {
        $category->increment('likes'); // زيادة عدد الإعجابات
    } else {
        $category->decrement('likes'); // إنقاص عدد الإعجابات
    }

    return response()->json(['likes' => $category->likes]);
}



}
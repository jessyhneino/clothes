<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productwinter;
use Illuminate\Support\Facades\DB;

class ProductwinterController extends Controller
{
    public function cardswinter(){
        // $products = DB::table('categories')->get();
        $products = Productwinter::all();
        return view('cardswinter', compact('products'));
    }


    public function createwinter(){
        return view('createwinter');
    }

    public function editwinter($id){
        // $product = DB::table('categories')->where('id',$id)->first();
        $product = Productwinter::findorFail($id);
        return view('editwinter', compact('product'));
    }

    public function insertwinter(Request $request){

        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = public_path('images'); // تحديد المسار داخل public
        $request->image->move($path, $file_name);
        $image_path = 'images/'.$file_name;

Productwinter::create([
    'name_product' => $request->name_product,
    'price' => $request->price,
    'image' => $image_path, // حفظ مسار الصورة
    'description' => $request->description,
    // 'likes' => $request->likes,
    'user_id'=> auth()->id(),
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

        // $product = new Productwinter();
        // $product->name_product = $request->name_product;
        // $product->price = $request->price;
        // $product->image = $request->image;
        // $product->description = $request->description;
        // $product->save();

        // Productwinter::create([
        //     'name_product' => $request->name_product,
        //     'price' => $request->price,
        //     'image' => $request->image,
        //     'description' => $request->description,
        // ]);
        return redirect()->route('cardswinter');
    }

    public function updatewinter(Request $request, $id){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = public_path('images'); // تحديد المسار داخل public
        $request->image->move($path, $file_name);
        $image_path = 'images/'.$file_name;

        // DB::table('categories')->where('id',$id)->update([
        //     'name_product'=>$request->name_product,
        //     'price'=>$request->price,
        //     'image'=>$image_path,
        //     'description'=>$request->description,
        // ]);
        $product = Productwinter::findorFail($id);
        $product->update([
            'name_product'=>$request->name_product,
            'price'=>$request->price,
            'image'=>$image_path,
            'description'=>$request->description,
        ]);
        return redirect()->route('cardswinter');
    }

    public function delete($id){
        DB::table('productwinters')->where('id',$id)->delete();
        return redirect()->route('cardswinter');

    }

    // public function toggleLike(Request $request)
    // {
    //     $Productwinter = Productwinter::findOrFail($request->product_id);

    //     // تحقق مما إذا كان المستخدم قد أعجب بالفعل
    //     $liked = session()->get('liked_products', []);

    //     if (in_array($Productwinter->id, $liked)) {
    //         // إنقاص الإعجابات
    //         $Productwinter->likes--;
    //         $liked = array_diff($liked, [$Productwinter->id]); // إزالة المنتج من قائمة الإعجابات
    //     } else {

    //         // زيادة الإعجابات
    //         $Productwinter->likes++;
    //         $liked[] = $Productwinter->id;
    //     }

    //     session()->put('liked_products', $liked);
    //     $Productwinter->save();

    //     return response()->json(['likes' => $Productwinter->likes]);
    // }



}
    


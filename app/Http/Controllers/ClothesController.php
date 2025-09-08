<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Like;

class ClothesController extends Controller
{
    
    // public function cards(){
    //     return view('cards');
    // }
    

    public function cards(){
        // تحميل المنتجات مع العلاقات
        $products = Category::with(['likes', 'comments'])->get();
        
        // إذا كان المستخدم مسجل دخول، نحصل على المنتجات التي أعجب بها
        $likedProducts = [];
        if (auth()->check()) {
            $likedProducts = Like::where('user_id', auth()->id())->pluck('category_id')->toArray();
        }
        
        // تحميل البيانات بشكل أكثر كفاءة
        $products->loadCount(['likes', 'comments']);
        
        return view('cards', compact('products', 'likedProducts'));
    }

    public function dashboardTable(){
        $products = Category::all();
        return view('dashboardTable', compact('products'));
    }

    public function dashboardTablecat(){
        $products = Category::all();
        return view('dashboardTablecat', compact('products'));
    }

    public function complete($id){
        // تحميل المنتج مع العلاقات
        $product = Category::with(['likes', 'comments'])->find($id);
        
        // إذا كان المستخدم مسجل دخول، نحصل على حالة الإعجاب
        $isLiked = false;
        if (auth()->check()) {
            $isLiked = $product->isLikedByUser();
        }
        
        return view('complete', compact('product', 'isLiked'));
    }  

    public function create(){
        return view('create');
    }

    public function edit($id){
        // $product = DB::table('categories')->where('id',$id)->first();
        $product = Category::findorFail($id);
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
    'season' => $request->season,
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
        $product = Category::findOrFail($id);

    // تحقق إذا الملف موجود
    if ($request->hasFile('image')) {
        $file_extension = $request->file('image')->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = public_path('images');
        $request->file('image')->move($path, $file_name);
        $image_path = 'images/'.$file_name;

        // تحديث الصورة إذا تم رفعها
        $product->image = $image_path;
    }

    // تحديث باقي البيانات
    $product->name_product = $request->name_product;
    $product->price = $request->price;
    $product->season = $request->season;
    $product->description = $request->description;
    $product->save();

    return redirect()->route('cards');

    }

    public function delete($id){
        DB::table('categories')->where('id',$id)->delete();
        return redirect()->route('cards');

    }

    // public function toggleLike(Request $request)
    // {
    //     $category = Category::findOrFail($request->product_id);

    //     // تحقق مما إذا كان المستخدم قد أعجب بالفعل
    //     $liked = session()->get('liked_products', []);

    //     if (in_array($category->id, $liked)) {
    //         // إنقاص الإعجابات
    //         $category->likes--;
    //         $liked = array_diff($liked, [$category->id]); // إزالة المنتج من قائمة الإعجابات
    //     } else {

    //         // زيادة الإعجابات
    //         $category->likes++;
    //         $liked[] = $category->id;
    //     }

    //     session()->put('liked_products', $liked);
    //     $category->save();

    //     return response()->json(['likes' => $category->likes]);
    // }

    // public function add_cart(Request $request){
    //     if($request->isMethod('post')){
    //         return response()->json(['data' => $request->all()]);
    //     }else{
    //         return redirect()->route('home');
    //     }
    // }


}
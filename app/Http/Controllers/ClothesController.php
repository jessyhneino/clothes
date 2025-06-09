<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $products = DB::table('categories')->get();
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

        // $file_extension = $request->image->getClientOriginalExtension();
        // $file_name = time().'.'.$file_extension;
        // $path = 'images';
        // $request->image->move($path, $file_name);
        // $file_name='images/'.$file_name;


        DB::table('categories')->insert([
            'name_product'=>$request->name_product,
            'price'=>$request->price,
            'image'=>$request->image,
            'description'=>$request->description,
        ]);
        return response('تم');
    }
}



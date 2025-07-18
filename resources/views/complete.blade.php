@extends('layouts.master')

@section('title')
HOME
@endsection

@section('content')
<!-- ------------------------------------------ section complete-------------------------------------  -->
    <form id="details-product1" method="POST" action="{{route('update',$product->id)}}">
        @csrf
        <div class="details-product1  product1">
            <div class="image-pro1">
                <img src="{{asset($product->image)}}">
            </div>
            <div class="detail-pro1">
                <p class="p-pro1">Womens Fashion Lavender</p>
                <h2 class="h2-pro1">{{$product->name_product}}</h2>
                <h1 class="h1-pro1">${{$product->price}}</h1>
                <div class="div-select">
                    <select class="select-pro1">
                        <option value="">Size </option>
                        <option value="1"> SM </option>
                        <option value=""> M </option>
                        <option value=""> L </option>
                        <option value=""> XL</option>
                        <option value=""> XXL </option>
                        <option value=""> XXXL </option>   
                    </select>  
                </div>            
                <div class="btn-pro1">
                    <a href="#">
                        <button class="btn-pro11">Add To Basket</button> 
                    </a>
                </div>
                <div class="product-details2">
                    <h3 class="h3-pro1">Product Details :</h3>
                    <p class="p-pro2">{{$product->description}}</p>
                </div>
                
            </div>                   
        </div>
    </form>




<!-- ------------------------------------------end section complete-------------------------------------  -->



@endsection
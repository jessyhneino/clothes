@extends('layouts.master')

@section('title')
PRODUCTS
@endsection

@section('content') 

<!-- ------------------------------------------ section cards-------------------------------------  -->

    <form>
        <h1 class="head-shose"> Latest Products </h1>
        <div  class="shose"  id="shose">
            <div class="box">
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solid fa-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->
                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>T-shirt</h2>
                        <h3>$300.75</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star-half-stroke"></i>
                            <i  class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <a href="#details-product1"  >
                            <button class="btn3">Add To Cart</button> 
                        </a>
                    </div>
                </div>
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solid fa-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->
                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>Blouse</h2>
                        <h3>$100.99</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <a href="#details-product2"  >
                            <button class="btn3">Add To Cart</button> 
                        </a>
                    </div>
                </div>
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solid fa-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->
                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>NIKE</h2>
                        <h3>$100.99</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star-half-stroke"></i>
                            <i  class="fa-regular fa-star"></i>    
                        </div>
                        <a href="#details-product3"  >
                            <button class="btn3">Add To Cart</button> 
                        </a>
                    </div>
                </div>
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solid fa-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->
                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>PUMA</h2>
                        <h3>$100.99</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                        </div>
                        <a href="#details-product4"  >
                            <button class="btn3">Add To Cart</button> 
                        </a>
                    </div>
                </div>
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solid fa-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->
                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>Towel</h2>
                        <h3>$170</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                        </div>
                        <a href="#details-product5"  >
                            <button class="btn3">Add To Cart</button> 
                        </a>
                    </div>
                </div>
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solid fa-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->
                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>Jacket</h2>
                        <h3>$100.99</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <a href="#details-product6"  >
                            <button class="btn3">Add To Cart</button> 
                        </a>
                    </div>
                </div>
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solid fa-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->
                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>PRADA</h2>
                        <h3>$840.40</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                        </div>
                        <a href="#details-product7"  >
                            <button class="btn3">Add To Cart</button> 
                        </a>
                    </div>
                </div>
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solidfa-hear-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->
                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>Vison</h2>
                        <h3>$100.99</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star-half-stroke"></i>
                            <i  class="fa-solid fa-star-half-stroke"></i>
                            <i  class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <a href="#details-product8"  >
                            <button class="btn3">Add To Cart</button> 
                        </a>
                    </div>
                </div>
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solid fa-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->

                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>FILA</h2>
                        <h3>$800.40</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star-half-stroke"></i>
                            <i  class="fa-solid fa-star-half-stroke"></i>
                            <i  class="fa-solid fa-star-half-stroke"></i>
                            <i  class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <a href="#details-product9"  >
                            <button class="btn3">Add To Cart</button> 
                        </a>
                    </div>
                </div>
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solid fa-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->
                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>Sock</h2>
                        <h3>$50</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                        </div>
                        <a href="#details-product10"  >
                            <button class="btn3">Add To Cart</button>
                        </a>
                    </div>
                </div>
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solid fa-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->

                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>Pajamas</h2>
                        <h3>$700.22</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                        </div>
                        <a href="#details-product11"  >
                            <button class="btn3">Add To Cart</button> 
                        </a>
                    </div>
                </div>
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solid fa-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->

                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>Short</h2>
                        <h3>$100.99</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <a href="#details-product12"  >
                            <button class="btn3">Add To Cart</button> 
                        </a>
                    </div>
                </div>
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solid fa-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->
                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>Hat</h2>
                        <h3>$100.99</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star-half-stroke"></i>
                            <i  class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <a href="#details-product13"  >
                            <button class="btn3">Add To Cart</button> 
                        </a>
                    </div>
                </div>
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solid fa-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->
                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>Bag</h2>
                        <h3>$100</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <a href="#details-product14"  >
                            <button class="btn3">Add To Cart</button> 
                        </a>
                    </div>
                </div>
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solid fa-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->
                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>Sports Accessories</h2>
                        <h3>$500</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                        </div>
                        <a href="#details-product15"  >
                            <button class="btn3">Add To Cart</button> 
                        </a>
                    </div>
                </div>
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solid fa-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->
                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>Water bottle</h2>
                        <h3>$900</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                        </div>
                        <a href="#details-product16"  >
                            <button class="btn3">Add To Cart</button> 
                        </a>
                    </div>
                </div>
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solid fa-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->
                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>LACOSTE</h2>
                        <h3>$900</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                        </div>
                        <a href="#details-product17"  >
                            <button class="btn3">Add To Cart</button> 
                        </a>
                    </div>
                </div>
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solid fa-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->
                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>Hodi</h2>
                        <h3>$900</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                        </div>
                        <a href="#details-product18"  >
                            <button class="btn3">Add To Cart</button> 
                        </a>
                    </div>
                </div>
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solid fa-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->
                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>Earphone</h2>
                        <h3>$900</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                        </div>
                        <a href="#details-product19"  >
                            <button class="btn3">Add To Cart</button> 
                        </a>
                    </div>
                </div>
                <div class="card">
                        <!-- <div class="small-card">
                              <i  class="fa-solid fa-heart"></i>
                              <i  class="fa-solid fa-share"></i>     
                        </div> -->
                    <div class="image">
                        <img src="{{asset('images/bag.jpg')}}">
                    </div>
                    <div class="product-text">
                        <h2>Solar Glasses</h2>
                        <h3>$900</h3>
                        <div class="products-star">
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                            <i  class="fa-solid fa-star"></i>
                        </div>
                        <a href="#details-product20"  >
                            <button class="btn3">Add To Cart</button> 
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
<!-- ------------------------------------------end section cards-------------------------------------  -->









@endsection
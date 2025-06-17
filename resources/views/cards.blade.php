@extends('layouts.master')

@section('title')
PRODUCTS
@endsection

@section('content') 

<!-- ------------------------------------------ section cards-------------------------------------  -->
 
    
        <h1 class="head-shose"  > Latest Products </h1>
        <div class="btn-create">
           
        </div>
        <div  class="shose">
            <div class="box">
                @foreach($products as $product)
                    <div class="card">
                        <div class="image">
                            <img src="{{asset($product->image)}}">
                        </div>
                        <div class="product-text">
                            <h2>{{$product->name_product}}</h2>
                            <h3>${{$product->price}}</h3>
                            <div class="products-star">
                                <i  class="fa-solid fa-star"></i>
                                <i  class="fa-solid fa-star"></i>
                                <i  class="fa-solid fa-star"></i>
                                <i  class="fa-solid fa-star-half-stroke"></i>
                                <i  class="fa-solid fa-star-half-stroke"></i>
                            </div>

                            <form method="POST" action="{{route('likeStore',$product->id)}}">
                                @csrf
                                <div class="hart">
                                    <button type="submit">
                                        <i class="fa-regular fa-heart like-btn" data-id="{{ $product->id }}" data-liked="true"></i>
                                    </button>
                                    <input type="hidden" value="{{ $product->id }}" name="category_id" /> 
                                    <!-- <span class="likes-count" id="likes-count-{{ $product->id }}"></span> -->
                                </div>
                            </form>

                            <a class="btn3" href="{{route('complete', ['id' => $product->id])}}">Show The Product</a>
                           
                        </div>
                    </div>
                @endforeach
                <!-- <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                    </div>
                </div>
                <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                    </div>
                </div>
                <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                    </div>
                </div>
                <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                    </div>
                </div>
                <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                    </div>
                </div>
                <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                    </div>
                </div>
                <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                    </div>
                </div>
                <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                    </div>
                </div>
                <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                    </div>
                </div>
                <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                    </div>
                </div>
                <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                    </div>
                </div>
                <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                    </div>
                </div>
                <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                    </div>
                </div>
                <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                    </div>
                </div>
                <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                    </div>
                </div>
                <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                    </div>
                </div>
                <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                    </div>
                </div>
                <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                    </div>
                </div>
                <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                    </div>
                </div>
                <div class="card">
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
                        <a class="btn3" href="/complete">Show The Product</a>
                        
                    </div>
                </div> -->
                
            </div>
        </div>
<!-- ------------------------------------------end section cards-------------------------------------  -->









@endsection
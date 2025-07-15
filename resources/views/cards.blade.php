@extends('layouts.master')

@section('title')
Latest Products - Professional Fashion Store
@endsection

@section('content') 

<!-- ------------------------------------------ section cards-------------------------------------  -->
<section class="products-section">
    <div class="container">
        <h1 class="head-shose">
            <span class="letter">L</span>
            <span class="letter">a</span>
            <span class="letter">t</span>
            <span class="letter">e</span>
            <span class="letter">s</span>
            <span class="letter">t</span>
            <span class="letter">&nbsp;</span>
            <span class="letter">P</span>
            <span class="letter">r</span>
            <span class="letter">o</span>
            <span class="letter">d</span>
            <span class="letter">u</span>
            <span class="letter">c</span>
            <span class="letter">t</span>
            <span class="letter">s</span>
        </h1>

        @if(Auth::check() && Auth::user()->id == 2)
        <div class="btn-dashTable">
           <a href="/dashboardTable">
               <i class="fas fa-table"></i>
               Dashboard Table
           </a>
        </div>
        @endif
        
        <div class="shose">
            <div class="box">
                @foreach($products as $product)
                    <div class="card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="image">
                            <img src="{{asset($product->image)}}" alt="{{$product->name_product}}" loading="lazy">
                            <div class="image-overlay">
                                <div class="quick-view">
                                    <i class="fas fa-eye"></i>
                                </div>
                            </div>
                        </div>
                        <div class="product-text">
                            <div class="product-badge">
                                <span class="badge-new">New</span>
                            </div>
                            <h2>{{$product->name_product}}</h2>
                            <h3>${{number_format($product->price, 2)}}</h3>
                            
                            <div class="product-rating">
                                <div class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                </div>
                                <span class="rating-text">(4.5)</span>
                            </div>

                            <div class="hart">
                                @if(Auth::check())
                                    <form method="POST" action="{{route('likeStore',$product->id)}}" class="like-form">
                                        @csrf
                                        <button type="submit" class="like-btn-wrapper">
                                            <i class="fa-regular fa-heart like-btn" data-id="{{ $product->id }}" data-liked="true"></i>
                                        </button>
                                        <input type="hidden" value="{{ $product->id }}" name="category_id" /> 
                                    </form>
                                @else
                                    <button type="button" class="like-btn-wrapper" onclick="window.location.href='{{ route('login') }}'">
                                        <i class="fa-regular fa-heart like-btn" data-id="{{ $product->id }}" data-liked="true"></i>
                                    </button>
                                @endif
                                
                                <a href="{{route('comment', ['id' => $product->id])}}" class="comment-btn-wrapper">
                                    <i class="fa-regular fa-comment"></i>
                                </a>
                            </div>

                            <a class="btn3" href="{{route('complete', ['id' => $product->id])}}">
                                <span>View Details</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
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

<!-- Loading Spinner -->
<div class="loading-spinner" id="loadingSpinner">
    <div class="spinner"></div>
</div>

<!-- Quick View Modal -->
<div class="modal-overlay" id="quickViewModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Quick View</h3>
            <button class="modal-close" id="closeModal">&times;</button>
        </div>
        <div class="modal-body">
            <!-- Modal content will be loaded here -->
        </div>
    </div>
</div>

@endsection
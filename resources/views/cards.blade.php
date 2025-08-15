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



        @if(Auth::check() && Auth::user()->id == 1)
        <div class="btn-dashTable">
           <a href="/dashboardTable">
               <i class="fas fa-table"></i>
               Dashboard Table
           </a>
        </div>
        @endif
        
        @include('sidebarProduct')


        <div class="shose">
            <div class="box">
                @foreach($products as $product)
                    <div class="card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" data-season="{{ $product->season }}">
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
                                    <div class="like-btn-wrapper" data-product-id="{{ $product->id }}">
                                        <button type="button" onclick="toggleLike({{ $product->id }}, this)" class="like-btn-wrapper">
                                            <i class="fa-{{ in_array($product->id, $likedProducts) ? 'solid' : 'regular' }} fa-heart like-btn" 
                                               data-id="{{ $product->id }}" 
                                               data-liked="{{ in_array($product->id, $likedProducts) ? 'true' : 'false' }}"
                                               style="color: {{ in_array($product->id, $likedProducts) ? '#ef4444' : '#ec4899' }};"></i>
                                        </button>
                                        <span class="likes-count">{{ $product->likes_count }}</span>
                                    </div>
                                @else
                                    <button type="button" class="like-btn-wrapper" onclick="window.location.href='{{ route('login') }}'">
                                        <i class="fa-regular fa-heart like-btn" data-id="{{ $product->id }}" data-liked="false" style="color: #ec4899;"></i>
                                    </button>
                                    <span class="likes-count">{{ $product->likes_count }}</span>
                                @endif
                                
                                <a href="{{route('comment', ['id' => $product->id])}}" class="comment-btn-wrapper">
                                    <i class="fa-regular fa-comment"></i>
                                    <span class="comments-count">{{ $product->comments_count }}</span>
                                </a>
                            </div>

                            <a class="btn3" href="{{route('complete', ['id' => $product->id])}}">
                                <span>View Details</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
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

@push('scripts')
<script>
// دالة تغيير الإعجاب
function toggleLike(productId, button) {
    const likeBtn = button.querySelector('.like-btn');
    const likesCount = button.parentElement.querySelector('.likes-count');
    const currentLiked = likeBtn.dataset.liked === 'true';
    
    // تغيير حالة القلب فوراً
    if (currentLiked) {
        // إزالة الإعجاب
        likeBtn.classList.remove('fa-solid');
        likeBtn.classList.add('fa-regular');
        likeBtn.dataset.liked = 'false';
        likeBtn.style.color = '#ec4899';
    } else {
        // إضافة الإعجاب
        likeBtn.classList.remove('fa-regular');
        likeBtn.classList.add('fa-solid');
        likeBtn.dataset.liked = 'true';
        likeBtn.style.color = '#ef4444';
    }
    
    // إرسال الطلب للخادم
    const formData = new FormData();
    formData.append('category_id', productId);
    formData.append('_token', '{{ csrf_token() }}');
    
    fetch('{{ route("likeStore", ["id" => ":id"]) }}'.replace(':id', productId), {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        // تحديث عدد الإعجابات
        likesCount.textContent = data.likesCount;
        
        // تحديث حالة القلب بناءً على الاستجابة الفعلية
        if (data.isLiked) {
            likeBtn.classList.remove('fa-regular');
            likeBtn.classList.add('fa-solid');
            likeBtn.dataset.liked = 'true';
            likeBtn.style.color = '#ef4444';
        } else {
            likeBtn.classList.remove('fa-solid');
            likeBtn.classList.add('fa-regular');
            likeBtn.dataset.liked = 'false';
            likeBtn.style.color = '#ec4899';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        // إعادة الحالة الأصلية في حالة الخطأ
        if (currentLiked) {
            likeBtn.classList.remove('fa-regular');
            likeBtn.classList.add('fa-solid');
            likeBtn.dataset.liked = 'true';
            likeBtn.style.color = '#ef4444';
        } else {
            likeBtn.classList.remove('fa-solid');
            likeBtn.classList.add('fa-regular');
            likeBtn.dataset.liked = 'false';
            likeBtn.style.color = '#ec4899';
        }
    });
}
</script>
@endpush
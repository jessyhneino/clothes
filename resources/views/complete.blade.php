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
                <!-- <h1 class="h1-pro1">${{$product->price}}</h1> -->
                <h1 class="h1-pro1">${{ number_format($product->price,2) }} ₪</h1>
                
                
                <!-- أزرار الإعجاب والتعليق -->
                <div class="hart">
                    @if(Auth::check())
                        <div class="like-btn-wrapper" data-product-id="{{ $product->id }}">
                            <button type="button" onclick="toggleLike({{ $product->id }}, this)" class="like-btn-wrapper">
                                <i class="fa-{{ $isLiked ? 'solid' : 'regular' }} fa-heart like-btn" 
                                   data-id="{{ $product->id }}" 
                                   data-liked="{{ $isLiked ? 'true' : 'false' }}"
                                   style="color: {{ $isLiked ? '#ef4444' : '#ec4899' }};"></i>
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

                
                 <div class="mb-3 create-input" style="margin-bottom:12px;">
                    <label class="create-label" style="display:block;margin-bottom:6px;font-weight:600;color:#374151;">Quantity</label>
                    <input type="number" 
    name="quantity" 
    class="create-control" 
    value="1" 
    min="1" style="width:100%;padding:8px 10px;border:1px solid #d1d5db;border-radius:6px;background:#ffffff;color:#111827;outline:none;">
                </div>    

                <button class="add-to-cart" data-id="{{ $product->id }}"  data-price="{{ $product->price }}">Add to basket</button>
            

                <div class="product-details2">
                    <h3 class="h3-pro1">Product Details :</h3>
                    <p class="p-pro2">{{$product->description}}</p>
                </div>
                
            </div>                   
        </div>
    </form>

<!-- ------------------------------------------end section complete-------------------------------------  -->

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

// ********************************************* Cart ************************************************
document.addEventListener('DOMContentLoaded', function() {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function addToCart(productId, qty = 1) {
        fetch("{{ route('cart.add') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: qty
            })
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                // تحديث عدد العناصر في Navbar (اختياري)
                const el = document.getElementById('cart-count');
                if (el) el.innerText = data.cart_count;

                // إعادة التوجيه لصفحة السلة
                window.location.href = data.redirect_url;
            } else {
                alert(data.message || 'خطأ أثناء الإضافة');
            }
        })
        .catch(() => alert('حدث خطأ في الاتصال'));
    }

    // ربط الزر مع الكمية
    document.querySelectorAll('.add-to-cart').forEach(btn => {
        btn.addEventListener('click', function() {
            const productId = this.dataset.id;

            // قراءة الكمية من input المرتبط بالزر
            const quantityInput = this.parentElement.querySelector('input[name="quantity"]');
            const qty = parseInt(quantityInput.value) || 1;

            addToCart(productId, qty);
        });
    });
});





</script>
@endpush
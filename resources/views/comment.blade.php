@extends('layouts.master')

@section('title')
التعليقات - {{ $category->name_product }}
@endsection

@section('content') 

<div class="comment-section">
    <div class="container">
        <!-- معلومات الصنف -->
        <div class="product-info">
            <div class="product-image">
                <img src="{{ asset($category->image) }}" alt="{{ $category->name_product }}">
            </div>
            <div class="product-details">
                <h1>{{ $category->name_product }}</h1>
                <p class="price">${{ number_format($category->price, 2) }}</p>
                <a href="{{ route('cards') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                    العودة للمنتجات
                </a>
            </div>
        </div>

        <!-- رسائل النجاح والخطأ -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <!-- نموذج إضافة تعليق -->
        @auth
        <div class="comment-form-section">
            <h2>أضف تعليقك</h2>
            <form method="POST" action="{{ route('insertcom') }}" class="comment-form">
                @csrf
                <input type="hidden" name="category_id" value="{{ $category->id }}">
                <div class="form-group">
                    <textarea 
                        name="comment" 
                        placeholder="اكتب تعليقك هنا..." 
                        required
                        maxlength="1000"
                        rows="4"
                    ></textarea>
                    <div class="char-count">
                        <span class="current">0</span>/1000
                    </div>
                </div>
                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i>
                    إرسال التعليق
                </button>
            </form>
        </div>
        @else
        <div class="login-prompt">
            <p>يجب عليك <a href="{{ route('login') }}">تسجيل الدخول</a> لإضافة تعليق</p>
        </div>
        @endauth

        <div class="comments-list">
            <h2>التعليقات ({{ $category->comments->count() }})</h2>
            
            @if($category->comments->count() > 0)
                @foreach($category->comments as $comment)
                <div class="comment-item" data-comment-id="{{ $comment->id }}">
                    <div class="comment-header">
                        <div class="user-info">
                            <div class="user-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="user-details">
                                <h4>{{ $comment->user->name }}</h4>
                                <span class="comment-date">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        
                        @if(auth()->check() && auth()->id() == $comment->user_id)
                        <div class="comment-actions">
                            <button class="edit-btn" onclick="editComment({{ $comment->id }})">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form method="GET" action="{{ route('deletecom', $comment->id) }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="delete-btn" onclick="return confirm('هل أنت متأكد من حذف هذا التعليق؟')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                    
                    <div class="comment-content">
                        <div class="comment-text" id="comment-text-{{ $comment->id }}">
                            {{ $comment->comment }}
                        </div>
                        
                        <form method="POST" action="{{ route('updatecom', $comment->id) }}" class="edit-form" id="edit-form-{{ $comment->id }}" style="display: none;">
                            @csrf
                            @method('PUT')
                            <textarea name="comment" required maxlength="1000">{{ $comment->comment }}</textarea>
                            <div class="edit-actions">
                                <button type="submit" class="save-btn">حفظ</button>
                                <button type="button" class="cancel-btn" onclick="cancelEdit({{ $comment->id }})">إلغاء</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            @else
                <div class="no-comments">
                    <i class="fas fa-comments"></i>
                    <p>لا توجد تعليقات بعد. كن أول من يعلق!</p>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.querySelector('textarea[name="comment"]').addEventListener('input', function() {
    const current = this.value.length;
    const max = 1000;
    document.querySelector('.char-count .current').textContent = current;
    
    if (current > max * 0.9) {
        document.querySelector('.char-count').style.color = '#e74c3c';
    } else {
        document.querySelector('.char-count').style.color = '#666';
    }
});

function editComment(commentId) {
    document.getElementById(`comment-text-${commentId}`).style.display = 'none';
    document.getElementById(`edit-form-${commentId}`).style.display = 'block';
}

function cancelEdit(commentId) {
    document.getElementById(`comment-text-${commentId}`).style.display = 'block';
    document.getElementById(`edit-form-${commentId}`).style.display = 'none';
}
</script>
@endpush

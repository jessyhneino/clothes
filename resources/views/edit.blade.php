@extends('layouts.master')

@section('title')
EDIT
@endsection

@section('content') 



<div class="create" style="max-width:680px;margin:24px auto;padding:16px;border:1px solid #e5e7eb;border-radius:6px;background:#ffffff;">
    <h2 style="margin:0 0 16px 0;font-size:22px;font-weight:700;color:#1f2937;">تعديل المنتج</h2>
    <form method="POST" action="{{route('update',$product->id)}}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="mb-3 create-input" style="margin-bottom:12px;">
            <label class="create-label" style="display:block;margin-bottom:6px;font-weight:600;color:#374151;">Name Product</label>
            <input name="name_product" type="text" class="create-control" value="{{$product->name_product}}" style="width:100%;padding:8px 10px;border:1px solid #d1d5db;border-radius:6px;background:#ffffff;color:#111827;outline:none;">
        </div>
        <div class="mb-3 create-input" style="margin-bottom:12px;">
            <label class="create-label" style="display:block;margin-bottom:6px;font-weight:600;color:#374151;">Price</label>
            <input name="price" class="create-control" value="{{$product->price}}" style="width:100%;padding:8px 10px;border:1px solid #d1d5db;border-radius:6px;background:#ffffff;color:#111827;outline:none;">
        </div>
        <div class="mb-3 create-input" style="margin-bottom:12px;">
            <label class="create-label" style="display:block;margin-bottom:6px;font-weight:600;color:#374151;margin-right:12px">Image</label>
            @if(!empty($product->image))
            @php
                $imagePath = $product->image;
                $resolvedUrl = null;
                if ($imagePath) {
                    $candidates = [];
                    if (\Illuminate\Support\Str::startsWith($imagePath, ['http://', 'https://'])) {
                        $candidates[] = $imagePath;
                    } else {
                        $candidates[] = $imagePath;                 // e.g. 'uploads/..' or 'images/...'
                        $candidates[] = 'storage/'.$imagePath;      // e.g. when stored via Storage::disk('public')
                        $candidates[] = ltrim($imagePath, '/');     // remove leading slash if present
                    }
                    foreach ($candidates as $candidate) {
                        if (\Illuminate\Support\Str::startsWith($candidate, ['http://', 'https://'])) {
                            $resolvedUrl = $candidate;
                            break;
                        }
                        if (file_exists(public_path($candidate))) {
                            $resolvedUrl = asset($candidate);
                            break;
                        }
                    }
                    // Final fallback to asset original path
                    if (!$resolvedUrl) {
                        $resolvedUrl = asset($imagePath);
                    }
                }
            @endphp
            <div class="image-preview" style="display:flex;align-items:center;gap:12px;margin-bottom:8px;">
                @if(!empty($resolvedUrl))
                <img id="currentImage" src="{{ $resolvedUrl }}" alt="Current Image" style="width:100px;height:100px;object-fit:cover;border-radius:6px;border:1px solid #e5e7eb;background:#fff;">
                @else
                <span class="hint" style="color:#6b7280;font-size:12px;">لا توجد صورة محفوظة</span>
                @endif
                <span class="hint" style="color:#6b7280;font-size:12px;">الصورة الحالية</span>
            </div>
            @endif
            <input id="imageInput" name="image" type="file" class="create-control" accept="image/*" style="width:100%;padding:8px 10px;border:1px solid #d1d5db;border-radius:6px;background:#ffffff;color:#111827;outline:none;">
        </div>
        <!-- <div class="mb-3 create-input">
            <label class="create-label">Season</label>
            <input name="season" type="text" class="create-control" value="{{$product->season}}">
        </div> -->
        <div class="mb-3 create-input" style="margin-bottom:12px;">
            <label class="create-label" style="display:block;margin-bottom:6px;font-weight:600;color:#374151;margin-right:12px">Season</label>
            <select name="season" class="form-control" style="width:100%;padding:8px 10px;border:1px solid #d1d5db;border-radius:6px;background:#ffffff;color:#111827;outline:none;">
                <option value="summer" {{ $product->season === 'summer' ? 'selected' : '' }}>صيفي</option>
                <option value="winter" {{ $product->season === 'winter' ? 'selected' : '' }}>شتوي</option>
            </select>
        </div>
        <div class="mb-3 create-input" style="margin-bottom:12px;">
            <label class="create-label" style="display:block;margin-bottom:6px;font-weight:600;color:#374151;">Description</label>
            <textarea name="description" class="create-control" rows="6" style="width:100%;padding:8px 10px;border:1px solid #d1d5db;border-radius:6px;background:#ffffff;color:#111827;outline:none;" >{{$product->description}}</textarea>
        </div>
        <div class="button" style="margin-top:12px;text-align:right;">
            <button type="submit" class="btn " style="background:#4b5563;color:#ffffff;border:1px solid #4b5563;padding:8px 14px;border-radius:6px;cursor:pointer;font-weight:600;">Edit</button>
        </div>
    </form>
</div>


@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var imageInput = document.getElementById('imageInput');
    if (!imageInput) return;
    imageInput.addEventListener('change', function () {
        var file = imageInput.files && imageInput.files[0];
        var previewImage = document.getElementById('currentImage');
        if (file && previewImage) {
            var reader = new FileReader();
            reader.onload = function (e) {
                previewImage.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>
@endpush
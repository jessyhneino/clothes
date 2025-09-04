@extends('layouts.master')

@section('title')
EDIT POR
@endsection

@section('content') 



<div class="create" style="max-width:760px;margin:32px auto;padding:24px;border:1px solid #e5e7eb;border-radius:8px;background:#ffffff;">
    <h2 style="margin:0 0 24px 0;font-size:24px;font-weight:700;color:#1f2937;text-align:center;">تعديل</h2>
    <form method="POST" action="{{route('updatepro',$product->id)}}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="mb-3 create-input" style="margin-bottom:18px;">
            <label class="create-label" style="display:block;margin-bottom:8px;font-weight:600;color:#374151;">Name</label>
            <input name="name" type="text" class="create-control" value="{{$product->name}}" style="width:100%;padding:12px 14px;border:1px solid #d1d5db;border-radius:8px;background:#ffffff;color:#111827;outline:none;">
        </div>
        <div class="mb-3 create-input" style="margin-bottom:18px;">
            <label class="create-label" style="display:block;margin-bottom:8px;font-weight:600;color:#374151;margin-right:15px;">Image</label>
            @if(!empty($product->image))
            @php
                $imagePath = $product->image;
                $resolvedUrl = null;
                if ($imagePath) {
                    $candidates = [];
                    if (\Illuminate\Support\Str::startsWith($imagePath, ['http://', 'https://'])) {
                        $candidates[] = $imagePath;
                    } else {
                        $candidates[] = $imagePath;
                        $candidates[] = 'storage/'.$imagePath;
                        $candidates[] = ltrim($imagePath, '/');
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
                    if (!$resolvedUrl) {
                        $resolvedUrl = asset($imagePath);
                    }
                }
            @endphp
            <div class="image-preview" style="margin-bottom:12px;">
                <div style="color:#6b7280;font-size:13px;margin-bottom:6px;">الصورة الحالية</div>
                @if(!empty($resolvedUrl))
                <img id="currentImagePro" src="{{ $resolvedUrl }}" alt="Current Image" style="width:140px;height:140px;object-fit:cover;border-radius:10px;border:1px solid #e5e7eb;background:#fff;display:block;">
                @else
                <div style="color:#6b7280;font-size:13px;">لا توجد صورة محفوظة</div>
                @endif
            </div>
            @endif
            <input id="imageInputPro" name="image" type="file" class="create-control" accept="image/*" style="display:block;width:100%;padding:12px 14px;border:1px solid #d1d5db;border-radius:8px;background:#ffffff;color:#111827;outline:none;">
        </div>
        <div class="button" style="margin-top:20px;text-align:center;">
            <button type="submit" class="btn " style="background:#4b5563;color:#ffffff;border:1px solid #4b5563;padding:12px 22px;border-radius:8px;cursor:pointer;font-weight:700;min-width:140px;">حفظ</button>
        </div>
    </form>
</div>


@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var imageInput = document.getElementById('imageInputPro');
    if (!imageInput) return;
    imageInput.addEventListener('change', function () {
        var file = imageInput.files && imageInput.files[0];
        var previewImage = document.getElementById('currentImagePro');
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
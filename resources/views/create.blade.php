@extends('layouts.master')

@section('title')
CREATE
@endsection

@section('content') 



<div class="create" style="max-width:760px;margin:32px auto;padding:24px;border:1px solid #e5e7eb;border-radius:8px;background:#ffffff;">
    <form method="POST" action="{{route('insert')}}" enctype="multipart/form-data" >
        @csrf
        <div class="mb-3 create-input" style="margin-bottom:16px;">
            <label class="create-label" style="display:block;margin-bottom:6px;font-weight:600;color:#374151;">Name Product</label>
            <input name="name_product" type="text" class="create-control" style="width:100%;padding:10px 12px;border:1px solid #d1d5db;border-radius:6px;background:#ffffff;color:#111827;outline:none;">
        </div>
        <div class="mb-3 create-input" style="margin-bottom:16px;">
            <label class="create-label" style="display:block;margin-bottom:6px;font-weight:600;color:#374151;">Price</label>
            <input name="price" class="create-control" style="width:100%;padding:10px 12px;border:1px solid #d1d5db;border-radius:6px;background:#ffffff;color:#111827;outline:none;" >
        </div>
        <div class="mb-3 create-input" style="margin-bottom:16px;">
            <label class="create-label" style="display:block;margin-bottom:6px;font-weight:600;color:#374151;">Image</label>
            <input name="image" type="file" class="create-control" style="width:100%;padding:10px 12px;border:1px solid #d1d5db;border-radius:6px;background:#ffffff;color:#111827;outline:none;">
        </div>
        <!-- <div class="mb-3 create-input">
            <label class="create-label">Season</label>
            <input name="season" type="text" class="create-control">
        </div> -->
        <select name="season" class="form-control" style="width:100%;padding:10px 12px;border:1px solid #d1d5db;border-radius:6px;background:#ffffff;color:#111827;outline:none;margin-bottom:16px;">
            <option value="summer">صيفي</option>
            <option value="winter">شتوي</option>
        </select>
        <div class="mb-3 create-input" style="margin-bottom:16px;">
            <label class="create-label" style="display:block;margin-bottom:6px;font-weight:600;color:#374151;">Description</label>
            <textarea name="description" class="create-control" rows="6" style="width:100%;padding:10px 12px;border:1px solid #d1d5db;border-radius:6px;background:#ffffff;color:#111827;outline:none;" ></textarea>
        </div>
        <div class="button" style="text-align:right;">
            <button type="submit" class="btn " style="background:#4b5563;color:#ffffff;border:1px solid #4b5563;padding:10px 16px;border-radius:6px;cursor:pointer;font-weight:600;">Submit</button>
        </div>
    </form> 
</div>


@endsection
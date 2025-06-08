@extends('layouts.master')

@section('title')
PRODUCTS
@endsection

@section('content') 



<div class="create">
    <form method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="mb-3 create-input">
            <label class="create-label">Name Product</label>
            <input name="name_product" type="text" class="create-control">
        </div>
        <div class="mb-3 create-input">
            <label class="create-label">Price</label>
            <input name="price" class="create-control" >
        </div>
        <div class="mb-3 create-input">
            <label class="create-label">Image</label>
            <input name="image" type="file" class="create-control">
        </div>
        <div class="mb-3 create-input">
            <label class="create-label">Description</label>
            <textarea name="description" class="create-control" rows="8" ></textarea>
        </div>
        <div class="button">
            <button type="submit" class="btn ">Submit</button>
        </div>
    </form>
</div>


@endsection
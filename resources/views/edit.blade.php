@extends('layouts.master')

@section('title')
EDIT
@endsection

@section('content') 



<div class="create">
    <form method="POST" action="{{route('insert')}}" enctype="multipart/form-data" >
        @csrf
        <div class="mb-3 create-input">
            <label class="create-label">Name Product</label>
            <input name="name_product" type="text" class="create-control" value="{{$product->name_product}}">
        </div>
        <div class="mb-3 create-input">
            <label class="create-label">Price</label>
            <input name="price" class="create-control" value="{{$product->price}}">
        </div>
        <div class="mb-3 create-input">
            <label class="create-label">Image</label>
            <input name="image" type="file" class="create-control" value="{{$product->image}}">
        </div>
        <div class="mb-3 create-input">
            <label class="create-label">Description</label>
            <textarea name="description" class="create-control" rows="8" >{{$product->description}}</textarea>
        </div>
        <div class="button">
            <button type="submit" class="btn ">Submit</button>
        </div>
    </form>
</div>


@endsection
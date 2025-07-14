@extends('layouts.master')

@section('title')
EDIT POR
@endsection

@section('content') 



<div class="create">
    <form method="POST" action="{{route('updatepro',$product->id)}}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="mb-3 create-input">
            <label class="create-label">Name</label>
            <input name="name_product" type="text" class="create-control" value="{{$product->name}}">
        </div>
        <div class="mb-3 create-input">
            <label class="create-label">Image</label>
            <input name="image" type="file" class="create-control" value="{{$product->image}}">
        </div>
        <div class="button">
            <button type="submit" class="btn ">Submit</button>
        </div>
    </form>
</div>


@endsection
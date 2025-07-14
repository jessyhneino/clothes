@extends('layouts.master')

@section('title')
CREATE PRO
@endsection

@section('content') 



<div class="create">
    <form method="POST" action="{{route('insertpro')}}" enctype="multipart/form-data" >
        @csrf
        <div class="mb-3 create-input">
            <label class="create-label">Name</label>
            <input name="name_product" type="text" class="create-control">
        </div>
        <div class="mb-3 create-input">
            <label class="create-label">Image</label>
            <input name="image" type="file" class="create-control">
        </div>
        <div class="button">
            <button type="submit" class="btn ">Submit</button>
        </div>
    </form>
</div>


@endsection
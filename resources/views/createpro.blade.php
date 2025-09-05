@extends('layouts.master')

@section('title')
CREATE PRO
@endsection

@section('content') 



<div class="create">
    <form method="POST" action="{{route('insertpro')}}" enctype="multipart/form-data" >
        @csrf
        <div class="mb-3 create-input"  style="margin-top:20px;">
            <label class="create-label">Name</label>
            <input name="name" type="text" required class="create-control">
        </div>
        <div class="mb-3 create-input">
            <label class="create-label">Image</label>
            <input name="image" type="file" class="create-control"  style="background:white;">
        </div>
        <div class="button">
            <button type="submit" class="btn "  style="margin-bottom:20px;">Submit</button>
        </div>
    </form>
</div>


@endsection
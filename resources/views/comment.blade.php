@extends('layouts.master')

@section('title')
COMMENT
@endsection

@section('content') 

    <div class="comment">
         @foreach($products as $product) 
        <div>
            <p>jessy</p>
            <li>{{$product->comment}}</li>
        </div>
        @endforeach
       
    </div>

@endsection

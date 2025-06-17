@extends('layouts.master')

@section('title')
PRODUCTS
@endsection

@section('content') 

<form method="POST" action="{{route('insert')}}">
    @csrf
     <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name_Product</th>
                <th>Price</th>
                <th>Image</th>
                <th>Description</th>
                <th>Button</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)

            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name_product}}</td>
                <td>${{$product->price}}</td>
                <td><img src="{{asset($product->image)}}" alt="صورة المنتج"></td>
                <td>{{$product->description}}</td>
                <td>
                    <a class="a-create" href="/create" role="button">Create</a>
                    <a class="b-edit" href="{{route('edit', ['id' => $product->id])}}">Edit</a>
                    <a class="b-delete" href="{{route('delete', ['id' => $product->id])}}">Delete</a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

</form>

@endsection
@extends('layouts.master')

@section('title')
HOME
@endsection

@section('content') 

<div class="sid">
    
        @include('sidebar')

<form class="tabledash" method="POST" action="{{route('insertpro')}}">
    @csrf
     <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Button</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)

            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>
                    <div class="table-img">
                        <img src="{{asset($product->image)}}" alt="صورة المنتج">
                    </div>
                </td>
                <td>
                    <a class="a-create" href="/createpro" role="button">Create</a>
                    <a class="b-edit" href="{{route('editpro', ['id' => $product->id])}}">Edit</a>
                    <a class="b-delete" href="{{route('deletepro', ['id' => $product->id])}}">Delete</a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

</form>

</div>

@endsection





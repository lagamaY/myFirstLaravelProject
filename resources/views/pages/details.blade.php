@extends('layouts.app')

@section('title')

@endsection


@section('content')

<h1>Welcome to my product information page</h1>

   

        <h2>{{$products->product_name}}</h2>
        
        <h4>{{$products->product_price}}</h4>

        <h3>{{$products->product_description}}</h3>

        <h3>{{$products->created_at}}</h3>

        <button type="button" class="btn btn-warning"><a href="/edit/{{$products->id}}">edit</a></button>

        
        <button type="button" class="btn btn-warning"><a href="/delete/{{$products->id}}">delete</a></button>

    
@endsection
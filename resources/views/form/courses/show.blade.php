@extends('layouts.app')

@section('title')

@endsection


@section('content')

<h1>Welcome to my product information page</h1>

   
        <!-- <img src="{{ asset('storage/' . $products->image) }}" alt="Product Image"><br/> -->
        <img src="{{ asset($products->image) }}" alt="Image">

        
        <h2>{{$products->product_name}}</h2>
        
        <h4>{{$products->product_price}}</h4>

        <h3>{{$products->product_description}}</h3>

        <h3>{{$products->created_at}}</h3>

        <!-- Bouton de modification en laravel-->

        <button type="button" class="btn btn-warning"><a href="/courses/{{$products->id}}/edit">Modifier</a></button>

        <!-- Bouton de suppression en laravel-->

        <form action="{{ url('/courses/' . $products->id) }}" method="post">
        @csrf
        @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete product</button>
        </form>

    
@endsection
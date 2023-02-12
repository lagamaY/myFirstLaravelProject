@extends('layouts.app')

@section('title')


@endsection


@section('content')

<h1>Welcome to my product information page</h1>

    @foreach($products as $item)

        <h2><a href= '/details/{{$item->id}}'>{{$item->product_name}}</a></h2>

    @endforeach
@endsection
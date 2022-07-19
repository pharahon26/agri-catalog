@extends('layout.layout')

@section('content')
    <div class="container justify-content-center">
        <div class="row pt-3">
            <div class="col-2"></div>
            <div class="col p-3 bg-light">
                <img src='/storage/{{$product->image}}' alt="product image">
                <p class="fw-bold p-1">{{ $product->name }}</p>
                <p class="mv-2">{{ $product->category }}</p>
                <p>{{ $product->price }} fcfa / {{ $product->quantity }}{{ $product->quantity_type }}</p>
                <a href="/product/{{ $product->id }}/edit" class="m-2">Modifier</a>
                <form action='/product/{{$product->id}}' method="post">
                    @csrf
                    @method('DELETE')
                    <button>supprimer</button>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection

@extends('layout.layout')

@section('content')
    <div class="container justify-content-center">
        <div class="row pt-3">
            <div class="col-2"></div>
            <div class="col p-3 bg-light">
                <h2>Liste de produits</h2>
                <a href="produit/create">Nouveau produit</a>
                @foreach($products as $product)
                    <div class="card" >
                        <a href='/product/{{$product->id}}'>
                            <p class="fw-bold p-1">{{ $product->name }}</p>
                            <p>{{ $product->category }}</p>
                            <p>{{ $product->price }} fcfa - {{ $product->quantity }} {{ $product->quantity_type }}</p>
                        </a>

                    </div>
                @endforeach
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection

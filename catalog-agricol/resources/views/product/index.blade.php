@extends('layout.layout')

@section('content')
    <div class="container justify-content-center">
        <div class="row pt-3">
            <div class="col-2"></div>
            <div class="col p-3">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h2>Liste de produits</h2>
                            @if (Auth::check())
                                <button class="bb bb-3"><a class="m-2" href="{{ Route('produit.create')}}">Nouveau produit</a></button>

                            @endif
                        </div>

                        <div>
                            <form class="d-flex" action="{{Route('produit.search')}}" method="post" role="search">
                                @csrf
                                <input class="form-control me-2" type="search" name="search" placeholder="recherche" aria-label="recherche">
                                <select  class="form-control p-2" name="category" id="category">
                                    <option value="*">Catégories</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <button class="custom-btn" type="submit">Rechercher</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        @foreach($products as $product)
                            <div class="card m-2" >
                                <div class="card-body">
                                    <a href='/product/{{$product->id}}'>
                                        <div class="row">
                                            <div class="col-3">
                                                <img class="align-self-center" src='/storage/{{$product->image}}' alt="product image" width="200" height="120">
                                            </div>
                                            <div class="col-9">
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-bold p-1">{{ $product->name }}</p>
                                                    <p class="p-1">{{ $product->category->name }}</p>
                                                    <p class="p-1">{{ $product->price }} fcfa </p>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <p class="p-1">{{ $product->quantity }} {{ $product->quantity_type }}</p>
                                                </div>

                                                <p class="p-2">{{ $product->description }}</p>

                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <p>{{$products->links()}}</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-2">

            </div>
        </div>
    </div>
@endsection

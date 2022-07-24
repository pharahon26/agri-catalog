@extends('layout.layout')

@section('content')
    <div class="container justify-content-center">
        <div class="row pt-3">
            <div class="col-2"></div>
            <div class="col p-3">
                <div class="card">
                    <div class="card-header">
                        <h2>Liste de produits</h2>
                        <div>
                            <form class="d-flex" action='{{ Route("produit.search") }}' method="post" role="search">
                                @csrf
                                <input class="form-control me-2" type="search" name="search" value="{{$search}}" placeholder="{{$search}}" aria-label="recherche">
                                <select  class="form-control p-2" name="category" id="category">
                                    <option value="*">Catégories</option>
                                    @foreach($categories as $category)
                                        @if($category_id == $category->id)
                                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                        @else
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <button type="submit">Rechercher</button>
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
            <div class="col-2"></div>
        </div>
    </div>
@endsection

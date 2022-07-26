@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-3">
            <div class="col-md-8 p-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Liste de produits</h4>
                        <div>
                            <form class="d-flex" action="{{Route('produit.search')}}" method="post" role="search">
                                @csrf
                                <input class="form-control me-2" type="search" name="search" placeholder="recherche" aria-label="recherche" style="border-radius: 15px;">
                                <select  class="form-control p-2" name="category" id="category" style="border-radius: 15px;" value="$category_id">
                                    <option value="*">Catégories</option>
                                    @foreach($categories as $category)
                                        @if($category->id === $category_id)
                                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                        @else
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <button class="bb-sr m-2" type="submit">Rechercher</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        @foreach($products as $product)
                            <div class="card m-2" style="border: none;">
                                <div class="card-body">
                                    <a  class="cc-bg" href='/product/{{$product->id}}'>
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="p-0" src='/storage/{{$product->image}}' alt="product image">
                                            </div>
                                            <div class="col-8 p-3">
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-bold">{{ $product->name }}</p>
                                                    <p class="">{{ $product->category->name }}</p>
                                                    <p class="">{{ $product->price }} fcfa </p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="t-desc pe-3">{{ $product->description }}</p>
                                                    <p class="ms-2">{{ $product->quantity }} {{ $product->quantity_type }}</p>
                                                </div>
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
        </div>
    </div>
@endsection

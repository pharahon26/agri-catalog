@extends('layout.layout')

@section('content')
    <div class="container justify-content-center">
        <div class="row pt-3">
            <div class="col-2"></div>
            <div class="col p-3 bg-light">

            <h2>Modifier produit</h2>

            <form action="/product/{{ $product->id }}" method="post">
                @csrf
                @method('PUT')
                <label for="image">image</label>
                <img src="{{ $product->image }}" alt="product image">
                <input type="image" src="" alt="">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}">
                <label for="price">Prix</label>
                <input type="number" name="price" id="price"  value="{{ $product->price }}">
                <label for="quantity">Quantité</label>
                <input type="number" name="quantity" id="quantity"  value="{{ $product->quantity }}">
                <label for="quantity_type">unités</label>
                <select name="quantity_type" id="quantity_type" value="{{ $product->quantity_type }}">
                    <option value="unité">unité</option>
                    <option value="kg">kg</option>
                    <option value="g">g</option>
                </select>
                <label for="category">Catégorie</label>
                <select name="category" id="category" value='{{$product->category_id}}'>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <input type="submit" value="edit product">
            </form>

            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection

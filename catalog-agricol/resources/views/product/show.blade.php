@extends('layout.layout')

@section('content')
    <div class="container justify-content-center">
        <div class="row pt-3">
            <div class="col-3"></div>
            <div class="col p-3">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <p class="fw-bold p-1">{{ $product->name }}</p>
                            <p class="p-1">{{ $product->category->name }}</p>
                            <p class="p-1">{{ $product->price }} fcfa</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <img src='/storage/{{$product->image}}' alt="product image" width="200" style="max-height: 250px;">
                            </div>
                            <div class="col">
                                <p>{{ $product->quantity }} {{ $product->quantity_type }}</p>
                                <p class="p-2">{{ $product->description }}</p>
                            </div>
                        </div>
                        @if (Auth::check())
                            <div class="d-flex justify-content-end">
                                <a href="/product/{{ $product->id }}/edit" class="m-2">Modifier</a>
                                <form action='/product/{{$product->id}}' method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button>supprimer</button>
                                </form>
                            </div>

                        @endif
                    </div>
                </div>

            </div>
            <div class="col-3"></div>
        </div>
    </div>
@endsection

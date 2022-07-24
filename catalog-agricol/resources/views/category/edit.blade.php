@extends('layout.layout')

@section('content')
    <div class="container justify-content-center">
        <div class="row pt-5">
            <div class="col-2"></div>
            <div class="col p-3 bg-light">

            <h2>Modifier catégorie</h2>

            <form action="/category/{{ $category->id }}" method="post">
                @csrf
                @method('PUT')
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" value="{{$category->name}}">
                <div>
                    <label class="form-label p-2" for="description">Description</label>
                    <input  class="form-control" type="text" name="description" id="description" value="{{ $category->description }}">
                </div>

                <input type="submit" value="Modifier">
            </form>

            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection

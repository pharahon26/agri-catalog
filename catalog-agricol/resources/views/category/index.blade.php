@extends('layout.layout')

@section('content')
    <div class="container justify-content-center">
        <div class="row pt-3">
            <div class="col-2"></div>
            <div class="col p-3 bg-light">
                <h2>Liste de categories</h2>
                <a href="/category/create">Nouvelle catégorie</a>
                @foreach($categories as $category)
                    <div class="card" >
                        <a href='/category/{{$category->id}}/edit'>
                            <p class="fw-bold p-1">{{ $category->name }}</p>
                            <form action='/category/{{$category->id}}' method="post">
                                @csrf
                                @method('DELETE')
                                <button>supprimer</button>
                            </form>

                        </a>

                    </div>
                @endforeach
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection

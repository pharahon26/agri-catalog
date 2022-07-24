@extends('layout.layout')

@section('content')
    <div class="container justify-content-center">
        <div class="row pt-3">
            <div class="col-2"></div>
            <div class="col p-3 bg-light">
                <div class="caerd">
                    <div class="cad-header">
                        <h2>Liste de categories</h2>
                        <a href="/category/create">Nouvelle catégorie</a>
                        <div>
                            <form class="d-flex" action='{{ Route("category.search") }}' method="post" role="search">
                                @csrf
                                <input class="form-control me-2" type="search" name="search" value="{{$search}}" placeholder="{{$search}}" aria-label="recherche">
                                <button type="submit">Rechercher</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach($categories as $category)
                            <div class="card" >
                                <a href='/category/{{$category->id}}/edit'>
                                    <p class="fw-bold p-1">{{ $category->name }}</p>
                                    <p>{{$category->description}}</p>
                                    <form action='/category/{{$category->id}}' method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button>supprimer</button>
                                    </form>

                                </a>

                            </div>
                        @endforeach
                    </div>
                </div>
                <div>
                    <p>{{$categories->links()}}</p>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection

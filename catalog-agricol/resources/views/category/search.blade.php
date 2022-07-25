@extends('layout.layout')

@section('content')
    <div class="container justify-content-center">
        <div class="row pt-3">
            <div class="col-2"></div>
            <div class="col p-3">
                <div class="card">
                    <div class="card-header">

                        <div class="d-flex justify-content-between">
                            <h4>Liste de categories</h4>
                            <div>
                                <a class="bb-pr p-1" href="/category/create">Nouvelle catégorie</a>
                            </div>

                        </div>
                        <div>
                            <form class="d-flex" action='{{ Route("category.search") }}' method="post" role="search">
                                @csrf
                                <input class="form-control me-2" type="search" name="search" placeholder="recherche" aria-label="recherche" style="border-radius: 15px;">
                                <button class="bb-sr" type="submit">Rechercher</button>
                            </form>
                        </div>
                        </div>
                        <div class="card-body">
                        @foreach($categories as $category)
                            <div class="card m-2" style="border: none;">
                                <div class="card-body">
                                    <a class="cc-bg" href='/category/{{$category->id}}/edit'>
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold p-1">{{ $category->name }}</p>
                                            <form action='/category/{{$category->id}}' method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bb-del ph-2">supprimer</button>
                                            </form>
                                        </div>
                                        <div>
                                            <p>{{$category->description}}</p>
                                        </div>

                                    </a>
                                </div>


                            </div>
                        @endforeach
                        </div>
                        <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <p>{{$categories->links()}}</p>
                        </div>
                        </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection

@extends('layout.layout')

@section('content')
    <div class="container justify-content-center">
        <div class="row pt-5">
            <div class="col-2"></div>
            <div class="col p-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Modifier catégorie</h4>
                    </div>
                    <div class="card-body">
                        <form action="/category/{{ $category->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <labe class="form-label p-2"l for="name">Nom</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{$category->name}}">
                            <div>
                                <label class="form-label p-2" for="description">Description</label>
                                <input class="form-control" type="text" name="description" id="description" value="{{ $category->description }}">
                            </div>
                            <div class="d-flex justify-content-end p-2 m-2">
                                <input class="bb-pr ph-2" type="submit" value="Modifier">
                            </div>
                        </form>
                    </div>

                </div>

            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection

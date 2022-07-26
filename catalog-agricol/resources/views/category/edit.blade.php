@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-md-6 p-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Modifier catégorie</h4>
                    </div>
                    <div class="card-body">
                        <form action="/category/{{ $category->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div>
                                <label class="form-label p-2 m-2"l for="name">Nom</label>
                                <input class="form-control" type="text" name="name" id="name" value="{{$category->name}}">
                                <span class="text-danger">@error('name'){{'Invalide'}}@enderror</span>
                            </div>
                            <div>
                                <label class="form-label p-2 m-2" for="description">Description</label>
                                <input class="form-control" type="text" name="description" id="description" value="{{ $category->description }}">
                                <span class="text-danger">@error('description'){{'Invalide'}}@enderror</span>
                            </div>
                            <div class="d-flex justify-content-end p-2 m-2">
                                <input class="bb-pr ps-2 pe-2" type="submit" value="Modifier">
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

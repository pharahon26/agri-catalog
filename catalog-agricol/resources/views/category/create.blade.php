@extends('layout.layout')

@section('content')
    <div class="container justify-content-center">
        <div class="row pt-5">
            <div class="col-2"></div>
            <div class="col p-3 bg-light">

            <h2>Nouvelle catégory</h2>

            <form action="/category" method="post">
                @csrf
                <label for="name">Nom</label>
                <input type="text" name="name" id="name">
                <div>
                    <label class="form-label p-2" for="description">Description</label>
                    <input  class="form-control" type="text" name="description" id="description">
                </div>

                <input type="submit" value="enregistrer">
            </form>

            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection

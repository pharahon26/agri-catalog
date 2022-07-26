@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-md-6 p-3">
            <div class="card">
                    <div class="card-header">
                        <h4>Nouvelle catégory</h4>
                    </div>
                    <div class="card-body">
                        <form action="/category" method="post">
                            @csrf
                            <div>
                                <label class="form-label p-2 m-2" for="name">Nom</label>
                                <input class="form-control" type="text" name="name" id="name">
                                <span class="text-danger">@error('name'){{'Invalide'}}@enderror</span>
                            </div>

                            <div>
                                <label class="form-label p-2 m-2" for="description">Description</label>
                                <input  class="form-control" type="text" name="description" id="description">
                                <span class="text-danger">@error('description'){{'Invalide'}}@enderror</span>
                            </div>

                            <div class="d-flex justify-content-end pt-2">
                                <input class="m-2 bb-pr ps-2 pe-2" type="submit" value="Enregistrer">
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

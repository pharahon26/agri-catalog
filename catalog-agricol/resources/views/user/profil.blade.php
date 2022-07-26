@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier mes informations</h4>
                </div>

                <div class="card-body">
                    <div>
                        <form action="{{ Route('user.update') }}" method="post" style="display:block; marging:auto">
                            @csrf
                            <div>
                                <label class="form-label p-2" for="name">Nom</label>
                                <input  class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
                            </div>
                            <div>
                                <label class="form-label p-2" for="email">Mail</label>
                                <input  class="form-control" type="email" name="email" id="email" value="{{ $user->email }}">
                            </div>
                            <div class="mt-3">
                                <a class="m-2 bb-sr p-2" href="{{ Route('user.password') }}" style="text-decoration: none;">Changer de mot de passe</a>
                            </div>


                            <div class="d-flex justify-content-end pt-2">
                                <input class="m-2 bb-pr" type="submit" value="Enregistrer">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

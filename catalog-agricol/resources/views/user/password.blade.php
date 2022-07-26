@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier mon mot de passe</h4>
                </div>

                <div class="card-body">
                    <div>
                        <form action="{{ Route('user.pm') }}" method="post" style="display:block; marging:auto">
                            @csrf
                            <div>
                                <label class="form-label p-2" for="password">Mot de passe</label>
                                <input  class="form-control" type="password" name="password" id="password">
                                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                            </div>
                            <div>
                                <label class="form-label p-2" for="new_password">Nouveau mot de passe</label>
                                <input  class="form-control" type="password" name="new_password" id="new_password">
                                <span class="text-danger">@error('new_password'){{$message}}@enderror</span>
                            </div>
                            <div>
                                <label class="form-label p-2" for="new_password_conf">Confirmez le nouveau mot de passe</label>
                                <input  class="form-control" type="password" name="new_password_conf" id="new_password_conf">
                                <span class="text-danger">@error('new_password_conf'){{$message}}@enderror</span>
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

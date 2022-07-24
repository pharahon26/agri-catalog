@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier mes informations</div>

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
                            
                            <input class="m-2" type="submit" value="Enregistrer">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Profil</h4>
                    <button class="bb-pr"><a class="m-2 text-white" href="{{ Route('user.edit') }}" style="text-decoration: none;">Modifier les informations</a></button>
                </div>

                <div class="card-body">
                    <div>
                        <h3>Bonjour {{$user->name}}</h3>
                    </div>
                    <div>
                        <p>{{$user->name}}</p>
                        <p>{{$user->email}}</p>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="bb-pr m-2"><a class="m-2 text-white" href="{{ Route('catalogue') }}" style="text-decoration: none;">Gérer les produits</a></button>
                        <button class="bb-pr m-2"><a class="m-2 text-white" href="{{ Route('category.index') }}" style="text-decoration: none;">Gérer les Categories</a></button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}<a class="m-2" href="{{ Route('user.edit') }}">Modifier les informations</a></div>

                <div class="card-body">
                    <div>
                        <h3>Bonjour {{$user->name}}</h3>
                    </div>
                    <div>
                        <p>{{$user->name}}</p>
                        <p>{{$user->email}}</p>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                    <div>
                        <a class="m-2" href="#">Gérer les produits</a>
                        <a class="m-2" href="{{ Route('category.index') }}">Gérer les Categories</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

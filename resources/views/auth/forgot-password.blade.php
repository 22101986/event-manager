@extends('layouts.app')

@section('content')
<div class="container" style="max-width:400px;">
    <h1 class="mb-4">Mot de passe oublié</h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Adresse e-mail</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autofocus>
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Envoyer le lien de réinitialisation</button>
    </form>

    <div class="mt-3 text-center">
        <a href="{{ route('login') }}">Retour à la connexion</a>
    </div>
</div>
@endsection
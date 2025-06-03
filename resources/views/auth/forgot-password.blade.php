@extends('layouts.app')

@section('content')
<div class="max-w-sm mx-auto my-16">
    <div class="card-auth">
        <h1 class="auth-title">Mot de passe oublié</h1>

        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="label-indigo">Adresse e-mail</label>
                <input id="email" type="email"
                       class="input-indigo"
                       name="email" value="{{ old('email') }}" required autofocus>
                @error('email') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn-indigo-gradient w-full">
                Envoyer le lien de réinitialisation
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="link-indigo">Retour à la connexion</a>
        </div>
    </div>
</div>
@endsection
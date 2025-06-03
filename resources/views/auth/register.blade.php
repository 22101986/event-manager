@extends('layouts.app')

@section('content')
<div class="max-w-sm mx-auto my-16">
    <div class="card-auth">
        <h1 class="auth-title">Inscription</h1>
        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="label-indigo">Nom complet</label>
                <input id="name" type="text"
                       class="input-indigo"
                       name="name" value="{{ old('name') }}" required autofocus>
                @error('name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="email" class="label-indigo">Adresse e-mail</label>
                <input id="email" type="email"
                       class="input-indigo"
                       name="email" value="{{ old('email') }}" required>
                @error('email') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="password" class="label-indigo">Mot de passe</label>
                <input id="password" type="password"
                       class="input-indigo"
                       name="password" required>
                @error('password') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="password_confirmation" class="label-indigo">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password"
                       class="input-indigo"
                       name="password_confirmation" required>
            </div>
            <button type="submit" class="btn-indigo-gradient w-full">
                Créer mon compte
            </button>
        </form>
        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="link-indigo">Déjà inscrit ? Se connecter</a>
        </div>
    </div>
</div>
@endsection
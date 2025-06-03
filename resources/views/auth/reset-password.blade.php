@extends('layouts.app')

@section('content')
<div class="max-w-sm mx-auto my-16">
    <div class="card-auth">
        <h1 class="auth-title">Réinitialiser le mot de passe</h1>
        <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div>
                <label for="email" class="label-indigo">Adresse e-mail</label>
                <input id="email" type="email"
                    class="input-indigo"
                    name="email" value="{{ old('email', $request->email) }}" required autofocus>
                @error('email') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            <div>
                <label for="password" class="label-indigo">Nouveau mot de passe</label>
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
                Réinitialiser le mot de passe
            </button>
        </form>
        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="link-indigo">Retour à la connexion</a>
        </div>
    </div>
</div>
@endsection
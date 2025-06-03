@extends('layouts.app')

@section('content')
<div class="max-w-sm mx-auto my-16">
    <div class="card-auth">
        <h1 class="auth-title">Connexion</h1>
        @if(session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="label-indigo">Adresse e-mail</label>
                <input id="email" type="email"
                       class="input-indigo"
                       name="email" value="{{ old('email') }}" required autofocus>
                @error('email') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="password" class="label-indigo">Mot de passe</label>
                <input id="password" type="password"
                       class="input-indigo"
                       name="password" required>
                @error('password') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="flex items-center mb-2">
                <input type="checkbox" class="form-checkbox accent-indigo-600" name="remember" id="remember">
                <label class="ml-2 text-gray-700 font-medium" for="remember">Se souvenir de moi</label>
            </div>
            <button type="submit" class="btn-indigo-gradient w-full">
                Se connecter
            </button>
        </form>
        <div class="mt-4 text-center">
            <a href="{{ route('register') }}" class="link-indigo">Pas encore de compte ? S'inscrire</a>
        </div>
        <div class="mt-2 text-center">
            <a href="{{ route('password.request') }}" class="link-secondary">Mot de passe oublié ?</a>
        </div>
    </div>
</div>
@endsection
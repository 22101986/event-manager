@extends('layouts.app')

@section('content')
<div class="max-w-sm mx-auto my-16">
    <div class="card-auth">
        <h1 class="auth-title">Vérification de l’adresse e-mail</h1>

        @if (session('status') == 'verification-link-sent')
            <div class="alert-success">
                Un nouveau lien de vérification vous a été envoyé par e-mail.
            </div>
        @endif

        <p class="mb-6 text-gray-800 text-center">
            Avant de continuer, veuillez vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer.<br>
            Si vous n’avez pas reçu l’e-mail, cliquez sur le bouton ci-dessous pour en recevoir un nouveau.
        </p>

        <form method="POST" action="{{ route('verification.send') }}" class="space-y-6">
            @csrf
            <button type="submit" class="btn-indigo-gradient w-full">
                Renvoyer l’e-mail de vérification
            </button>
        </form>

        <div class="mt-4 text-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="link-indigo">Se déconnecter</button>
            </form>
        </div>
    </div>
</div>
@endsection
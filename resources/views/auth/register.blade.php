@extends('layouts.app')

@section('content')
<div class="max-w-sm mx-auto my-16">
    <div class="bg-white rounded-3xl shadow-lg p-8">
        <h1 class="text-2xl font-extrabold text-indigo-700 mb-6 text-center">Inscription</h1>
        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block font-semibold text-indigo-600 mb-1">Nom complet</label>
                <input id="name" type="text"
                       class="w-full border-2 border-indigo-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200 transition"
                       name="name" value="{{ old('name') }}" required autofocus>
                @error('name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="email" class="block font-semibold text-indigo-600 mb-1">Adresse e-mail</label>
                <input id="email" type="email"
                       class="w-full border-2 border-indigo-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200 transition"
                       name="email" value="{{ old('email') }}" required>
                @error('email') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="password" class="block font-semibold text-indigo-600 mb-1">Mot de passe</label>
                <input id="password" type="password"
                       class="w-full border-2 border-indigo-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200 transition"
                       name="password" required>
                @error('password') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="password_confirmation" class="block font-semibold text-indigo-600 mb-1">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password"
                       class="w-full border-2 border-indigo-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200 transition"
                       name="password_confirmation" required>
            </div>
            <button type="submit"
                    class="w-full bg-gradient-to-r from-indigo-500 to-pink-500 text-white font-bold py-2 px-6 rounded-lg shadow hover:from-indigo-600 hover:to-pink-600 transition">
                Créer mon compte
            </button>
        </form>
        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Déjà inscrit ? Se connecter</a>
        </div>
    </div>
</div>
@endsection
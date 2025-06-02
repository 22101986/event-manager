@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-950 via-purple-950 to-gray-900">
    <div class="max-w-sm w-full mx-auto">
        <div class="bg-white rounded-3xl shadow-lg p-8">
            <h1 class="text-2xl font-extrabold text-indigo-700 mb-6 text-center">Réinitialiser le mot de passe</h1>
            <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <label for="email" class="block font-semibold text-indigo-600 mb-1">Adresse e-mail</label>
                    <input id="email" type="email"
                        class="w-full border-2 border-indigo-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200 transition"
                        name="email" value="{{ old('email', $request->email) }}" required autofocus>
                    @error('email') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <div>
                    <label for="password" class="block font-semibold text-indigo-600 mb-1">Nouveau mot de passe</label>
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
                    Réinitialiser le mot de passe
                </button>
            </form>
            <div class="mt-4 text-center">
                <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Retour à la connexion</a>
            </div>
        </div>
    </div>
</div>
@endsection
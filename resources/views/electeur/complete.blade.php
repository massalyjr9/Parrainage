@extends('layouts.appElecteur')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Compléter l'inscription</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('electeurs.complete') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="numero_telephone" class="block text-sm font-medium text-gray-700">Numéro de téléphone</label>
            <input type="text" name="numero_telephone" id="numero_telephone" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="adresse_email" class="block text-sm font-medium text-gray-700">Adresse email</label>
            <input type="email" name="adresse_email" id="adresse_email" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
            <input type="password" name="password" id="password" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 block w-full">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Compléter l'inscription</button>
    </form>
</div>
@endsection
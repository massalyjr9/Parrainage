@extends('layouts.appElecteur')

@section('content')
<div class="flex justify-center items-start bg-gray-100 pt-4">
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-5">
        <!-- Le contenu du formulaire reste inchangé -->
        <h2 class="text-2xl font-bold text-center text-gray-800">Inscription</h2>
        <p class="text-gray-600 text-center mb-4 mt-4">Créez votre compte en remplissant vos informations.</p>

        <form action="{{ route('register') }}" method="POST" class="mt-4">
            @csrf

            <!-- Numéro de Carte d'Électeur -->
            <div>
                <label for="numero_carte_electeur" class="block text-sm font-medium text-gray-700">Numéro de Carte d'Électeur</label>
                <input type="text" name="numero_carte_electeur" id="numero_carte_electeur" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg">
            </div>

            <!-- Numéro de Carte d'Identité -->
            <div class="mt-3">
                <label for="numero_carte_identite" class="block text-sm font-medium text-gray-700">Numéro de Carte d'Identité Nationale</label>
                <input type="text" name="numero_carte_identite" id="numero_carte_identite" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg">
            </div>

            <!-- Nom -->
            <div class="mt-3">
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" name="nom" id="nom" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg">
            </div>

            <!-- Prénom -->
            <div class="mt-3">
                <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                <input type="text" name="prenom" id="prenom" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg">
            </div>

            <!-- Bureau de Vote -->
            <div class="mt-3">
                <label for="bureau_vote" class="block text-sm font-medium text-gray-700">Numéro du Bureau de Vote</label>
                <input type="text" name="bureau_vote" id="bureau_vote" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mt-6">
                <button type="submit"
                        class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    S'inscrire
                </button>
            </div>
        </form>
        <p class="mt-4 text-sm text-center">Deja inscrit ? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Se connecter</a></p>
    </div>
</div>

@endsection

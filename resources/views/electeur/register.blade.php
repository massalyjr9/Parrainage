@extends('layouts.appElecteur')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Créer un compte électeur</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ route('electeurs.register') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="numero_carte_electeur" class="block text-sm font-medium text-gray-700">Numéro de carte d'électeur</label>
            <input type="text" name="numero_carte_electeur" id="numero_carte_electeur" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="numero_carte_identite" class="block text-sm font-medium text-gray-700">Numéro de carte d'identité</label>
            <input type="text" name="numero_carte_identite" id="numero_carte_identite" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="nom" class="block text-sm font-medium text-gray-700">Nom de famille</label>
            <input type="text" name="nom" id="nom" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="numero_bureau_vote" class="block text-sm font-medium text-gray-700">Numéro de bureau de vote</label>
            <input type="text" name="numero_bureau_vote" id="numero_bureau_vote" required class="mt-1 block w-full">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Créer un compte</button>
    </form>
</div>
@endsection
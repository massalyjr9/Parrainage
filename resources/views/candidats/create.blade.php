@extends('layouts.appDge')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Ajouter un candidat</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('candidats.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" name="nom" id="nom" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
            <input type="text" name="prenom" id="prenom" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="adresse_email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="adresse_email" id="adresse_email" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="numero_telephone" class="block text-sm font-medium text-gray-700">Téléphone</label>
            <input type="number" name="numero_telephone" id="numero_telephone" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="parti_politique" class="block text-sm font-medium text-gray-700">Parti Politique</label>
            <input type="text" name="parti_politique" id="parti_politique" class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="slogan" class="block text-sm font-medium text-gray-700">Slogan</label>
            <input type="text" name="slogan" id="slogan" class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
            <input type="file" name="photo" id="photo" class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="couleur1" class="block text-sm font-medium text-gray-700">Couleur 1</label>
            <input type="color" name="couleur1" id="couleur1" class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="couleur2" class="block text-sm font-medium text-gray-700">Couleur 2</label>
            <input type="color" name="couleur2" id="couleur2" class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="couleur3" class="block text-sm font-medium text-gray-700">Couleur 3</label>
            <input type="color" name="couleur3" id="couleur3" class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="url_info" class="block text-sm font-medium text-gray-700">URL Infos</label>
            <input type="text" name="url_info" id="url_info" class="mt-1 block w-full">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Ajouter</button>
    </form>
</div>
@endsection
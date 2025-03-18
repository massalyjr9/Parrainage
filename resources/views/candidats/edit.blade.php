@extends('layouts.appDge')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Éditer le candidat</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('candidats.update', $candidat->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" name="name" id="name" value="{{ $candidat->nom }}" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
            <input type="text" name="prenom" id="prenom" value="{{ $candidat->prenom }}" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone</label>
            <input type="number" name="telephone" id="telephone" value="{{ $candidat->numero_telephone }}" required class="mt-1 block w-full">

        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ $candidat->adresse_email }}" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="party" class="block text-sm font-medium text-gray-700">Parti</label>
            <input type="text" name="party" id="party" value="{{ $candidat->parti_politique }}" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="slogan" class="block text-sm font-medium text-gray-700">Slogan</label>
            <input type="text" name="slogan" id="slogan" value="{{ $candidat->slogan }}" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
            <input type="file" name="photo" id="photo" class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="color1" class="block text-sm font-medium text-gray-700">Couleur 1</label>
            <input type="color" name="color1" id="color1" value="{{ $candidat->couleur1 }}" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="color2" class="block text-sm font-medium text-gray-700">Couleur 2</label>
            <input type="color" name="color2" id="color2" value="{{ $candidat->couleur2 }}" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="color3" class="block text-sm font-medium text-gray-700">Couleur 3</label>
            <input type="color" name="color3" id="color3" value="{{ $candidat->couleur3 }}" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="url_info" class="block text-sm font-medium text-gray-700">URL Infos</label>
            <input type="text" name="url_info" id="url_info" value="{{ $candidat->url_page_infos }}" required class="mt-1 block w-full">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Mettre à jour</button>
    </form>
</div>
@endsection
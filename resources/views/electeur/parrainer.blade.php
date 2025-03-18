@extends('layouts.appElecteur')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Parrainer un Candidat</h1>

    @if (session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Liste des candidats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($candidats as $candidat)
            <div class="bg-white p-6 shadow-md rounded-lg text-center">
                <img src="{{ asset('storage/'.$candidat->photo) }}" alt="Photo de {{ $candidat->prenom }} {{ $candidat->nom }}" class="h-32 w-32 mx-auto rounded-full mb-4">
                <p class="text-gray-600 mt-4">{{ $candidat->prenom }} {{ $candidat->nom }}</p>
                <h2 class="text-xl font-semibold">Parti Politique: {{ $candidat->parti_politique }}</h2>
                <p class="text-gray-600 italic">Slogan: "{{ $candidat->slogan }}"</p>

                <!-- Afficher les trois couleurs du parti politique sous forme de ronds -->
                @php
                    $couleurs = json_decode($candidat->trois_couleurs_parti);
                @endphp
                <div class="flex justify-center mt-4 space-x-2">
                    @foreach ($couleurs as $couleur)
                        <div class="h-6 w-6 rounded-full" style="background-color: {{ $couleur }};"></div>
                    @endforeach
                </div>

                <form action="{{ route('parrainage.parrainer', ['candidatId' => $candidat->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Parrainer
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
@extends('layouts.appDge')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Tableau de bord DGE</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('dge.create-candidat.form') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Ajouter un candidat</a>

    <table class="min-w-full bg-white mt-4">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Nom</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Parti</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($candidats as $candidat)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $candidat->nom }}</td>
                    <td class="py-2 px-4 border-b">{{ $candidat->adresse_email }}</td>
                    <td class="py-2 px-4 border-b">{{ $candidat->parti_politique }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('candidats.edit', $candidat->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Éditer</a>
                        <form action="{{ route('candidats.destroy', $candidat->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
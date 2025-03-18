@extends('layouts.appCandidat')

@section('content')
<div class="flex justify-center items-center h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold text-center text-gray-800">Connexion Candidat</h2>
        <p class="text-gray-600 text-center mb-4">Veuillez entrer vos informations pour vous connecter.</p>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.candidat.post') }}" method="POST" class="mt-4">
            @csrf

            <div class="mt-3">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
            </div>
            <div class="mt-3">
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" name="password" id="password" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
            </div>

            <div class="mt-6">
                <button type="submit"
                        class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                    Se connecter
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@extends('layouts.appElecteur')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Vérifier le Code d'Authentification</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('parrainage.verify.form') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="code_verification" class="block text-sm font-medium text-gray-700">Code de vérification</label>
            <input type="text" name="code_verification" id="code_verification" required class="mt-1 block w-full">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Vérifier</button>
    </form>
</div>
@endsection
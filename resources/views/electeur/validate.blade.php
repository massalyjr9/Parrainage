@extends('layouts.appElecteur')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Validation du code</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('electeurs.validate') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="code_auth" class="block text-sm font-medium text-gray-700">Code d'authentification</label>
            <input type="text" name="code_auth" id="code_auth" required class="mt-1 block w-full">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Valider</button>
    </form>
</div>
@endsection
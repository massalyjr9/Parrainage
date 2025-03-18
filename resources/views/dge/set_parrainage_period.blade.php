@extends('layouts.appDge')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Définir la Période de Parrainage</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('parrainage-period.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="start_date" class="block text-sm font-medium text-gray-700">Date de début</label>
            <input type="date" name="start_date" id="start_date" value="{{ $period->start_date ?? '' }}" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="end_date" class="block text-sm font-medium text-gray-700">Date de fin</label>
            <input type="date" name="end_date" id="end_date" value="{{ $period->end_date ?? '' }}" required class="mt-1 block w-full">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Enregistrer</button>
    </form>
</div>
@endsection
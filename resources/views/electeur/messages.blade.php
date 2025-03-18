@extends('Utilisateurs.BaseDashboard')

@section('Contenus')
<div class="p-6">
    <h1 class="text-3xl font-bold mb-6">Messages et Notifications</h1>

    <div class="bg-white shadow-md rounded-lg p-4">
        @if(isset($notifications) && $notifications->count() > 0)
            <ul class="divide-y divide-gray-200">
                @foreach($notifications as $notification)
                    <li class="py-4">
                        <div class="flex justify-between items-center">
                            <span class="font-semibold text-gray-800">{{ $notification->title }}</span>
                            <span class="text-gray-500 text-sm">
                                {{ $notification->created_at->format('d/m/Y H:i') }}
                            </span>
                        </div>
                        <p class="mt-2 text-gray-700">{{ $notification->message }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">Aucune notification à afficher pour le moment.</p>
        @endif
    </div>
</div>
@endsection

@extends('Utilisateurs.BaseDashboard')

@section('Contenus')
            <!-- Section Contact -->
            <section class="flex-1 p-6">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-bold text-gray-800">Contactez-nous</h2>
                    <p class="mt-4 text-lg text-gray-600">Une question ou une suggestion ? Nous sommes à votre écoute.</p>

                    <form class="mt-6">
                        <input
                            type="text"
                            placeholder="Votre nom"
                            class="w-full p-3 border rounded-lg mb-4">
                        <input
                            type="email"
                            placeholder="Votre e-mail"
                            class="w-full p-3 border rounded-lg mb-4">
                        <textarea
                            placeholder="Votre message"
                            class="w-full p-3 border rounded-lg mb-4"
                            rows="4"></textarea>
                        <button
                            class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">Envoyer</button>
                    </form>
                </div>
            </section>
@endsection

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>KaayParrainer - Accueil</title>
        <!-- Tailwind CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
            rel="stylesheet">
        <!-- Google Fonts -->
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0"/>
        <!-- Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    </head>

    <body class="bg-gray-100">

        <!-- Navbar -->
        <nav class="bg-white shadow-md dark:bg-gray-900 p-4">
            <div class="max-w-screen-xl flex items-center justify-between mx-auto">
                <!-- Logo -->
                <a href="#" class="flex items-center space-x-3">
                    <img
                        src="{{ asset('images/Logo_KP.png') }}"
                        class="h-12 w-12"
                        alt="KaayParrainer Logo">
                    <span class="text-2xl font-semibold dark:text-white">KaayParrainer</span>
                </a>

                <div
                    class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                    id="navbar-user">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a
                                href="{{url('listeCandidats')}}"
                                class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Parties Politiques</a>
                        </li>
                        <li>
                            <a
                                href="{{url('public.statistique')}}"
                                class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Statistiques</a>
                        </li>
                        <li>
                            <a
                                href="{{url('/login/electeur')}}"
                                class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Vous etes electeur?</a>
                        </li>
                        <li>
                            <a href="{{url('/login/candidat')}}">Vous etes candidat?</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Section Hero -->
        <header class="bg-blue-400 text-white py-16 text-center">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-4xl font-bold">Facilitez le parrainage des élections avec KaayParrainer</h1>
                <p class="mt-4 text-lg">Une plateforme innovante pour centraliser, gérer et
                    suivre le parrainage des candidats aux élections présidentielles du Sénégal.</p>
                <a
                    href="{{url('register')}}"
                    class="mt-6 inline-block bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">Rejoindre la plateforme</a>

            </div>
        </header>

        <!-- Section Présentation -->
        <section class="py-16 bg-gray-50 text-center">
            <div class="max-w-5xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-800">Pourquoi choisir KaayParrainer ?</h2>
                <p class="mt-4 text-lg text-gray-600">Nous simplifions le processus de
                    parrainage et offrons aux électeurs un outil sécurisé pour soutenir leurs
                    candidats.</p>

                <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 shadow-md rounded-lg">
                        <span class="material-symbols-sharp text-blue-500 text-4xl">verified_user</span>
                        <h3 class="mt-4 text-xl font-semibold">Sécurisé</h3>
                        <p class="text-gray-600 mt-2">Nos processus garantissent une transparence et une protection des données.</p>
                    </div>
                    <div class="bg-white p-6 shadow-md rounded-lg">
                        <span class="material-symbols-sharp text-green-500 text-4xl">bar_chart</span>
                        <h3 class="mt-4 text-xl font-semibold">Suivi en temps réel</h3>
                        <p class="text-gray-600 mt-2">Un suivi instantané du nombre de parrainages collectés pour chaque candidat.</p>
                    </div>
                    <div class="bg-white p-6 shadow-md rounded-lg">
                        <span class="material-symbols-sharp text-red-500 text-4xl">how_to_vote</span>
                        <h3 class="mt-4 text-xl font-semibold">Facile à utiliser</h3>
                        <p class="text-gray-600 mt-2">Inscrivez-vous, parrainez un candidat et suivez votre engagement chez vous.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Processus de Parrainage -->
        <section class="py-16 text-center bg-white">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-800">Comment ça marche ?</h2>
                <p class="mt-4 text-lg text-gray-600">Le processus est simple et rapide.</p>

                <div
                    class="mt-10 flex flex-col md:flex-row justify-center items-center space-y-8 md:space-y-0 md:space-x-12">
                    <div class="text-center">
                        <span class="text-4xl font-bold text-blue-600">1</span>
                        <h3 class="text-xl font-semibold mt-2">Créez un compte</h3>
                        <p class="text-gray-600">Inscrivez-vous en quelques secondes.</p>
                    </div>
                    <div class="text-center">
                        <span class="text-4xl font-bold text-green-600">2</span>
                        <h3 class="text-xl font-semibold mt-2">Choisissez un candidat</h3>
                        <p class="text-gray-600">Sélectionnez un candidat à parrainer.</p>
                    </div>
                    <div class="text-center">
                        <span class="text-4xl font-bold text-red-600">3</span>
                        <h3 class="text-xl font-semibold mt-2">Confirmez votre parrainage</h3>
                        <p class="text-gray-600">Votre soutien est enregistré immédiatement.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Contact -->
        <section class="py-16 bg-gray-50 text-center">
            <div class="max-w-3xl mx-auto">
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

       
        <!-- Footer -->
        @include('layouts.footer')
    </body>
</html>

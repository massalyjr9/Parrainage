<!-- Navbar -->
<nav class="bg-white shadow-md dark:bg-gray-900 p-4">
    <div class="max-w-screen-xl flex items-center justify-between mx-auto">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="flex items-center space-x-3">
            <img
                src="{{ asset('images/Logo_KP.png') }}"
                class="h-12 w-12"
                alt="KaayParrainer Logo">
            <span class="text-2xl font-semibold dark:text-white">KaayParrainer</span>
        </a>

        <!-- Liens de navigation -->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ url('listeCandidats') }}" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Parties Politiques</a>
                </li>
                <li>
                    <a href="{{ url('/statistiques') }}" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Statistiques</a>
                </li>
                <li>
                    <a href="{{ url('/contact') }}" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

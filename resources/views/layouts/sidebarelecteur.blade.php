                <!-- Sidebar (Menu de navigation) -->
                <aside class="w-64 bg-white dark:bg-gray-800 shadow-md h-screen p-5">
                    <h5 class="text-lg font-semibold text-gray-700 dark:text-white">Menu</h5>
                    <ul class="mt-4 space-y-2">
                        <li>
                            <a
                                href="{{url("/ContentDashboard")}}"
                                class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <span class="material-symbols-sharp">grid_view</span>
                                <span class="ml-3">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('profil') }}"
                                class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <span class="material-symbols-sharp">person_outline</span>
                                <span class="ml-3">Information</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('message') }}"
                                class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <span class="material-symbols-sharp">mail_outline</span>
                                <span class="ml-3">Messages</span>
                                <span class="ml-auto bg-blue-500 text-white px-2 py-1 text-xs rounded-full">14</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('parrainage') }}"
                                class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <span class="material-symbols-sharp">draw</span>
                                <span class="ml-3">Parrainage</span>
                            </a>
                        </li>
                        <li>
                            {{--
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                            Déconnexion
                        </button>
                    </form> --}}

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <span class="material-symbols-sharp">logout</span>
                            <span class="ml-3">Déconnexion</span>
                        </button>
                    </form>

                        </li>
                    </ul>
                </aside>

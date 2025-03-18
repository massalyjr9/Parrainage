<!-- Footer -->
<footer class="bg-gray-800 text-white p-6">
    <div class="max-w-screen-xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <!-- Informations de l'entreprise -->
            <div class="mb-4 md:mb-0">
                <p class="text-sm">&copy; {{ date('Y') }} KaayParrainer. Tous droits réservés.</p>
            </div>

            <!-- Liens utiles -->
            <div class="flex space-x-4">
                <a href="{{ url('/conditions') }}" class="text-gray-400 hover:text-white">Conditions d'utilisation</a>
                <a href="{{ url('/privacy') }}" class="text-gray-400 hover:text-white">Politique de confidentialité</a>
                <a href="{{ url('/contact') }}" class="text-gray-400 hover:text-white">Contact</a>
            </div>

            <!-- Réseaux sociaux -->
            <div class="flex space-x-4">
                <a href="https://facebook.com" target="_blank" class="text-gray-400 hover:text-white">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com" target="_blank" class="text-gray-400 hover:text-white">
                    <i class="fab fa-x"></i>
                </a>
                <a href="https://instagram.com" target="_blank" class="text-gray-400 hover:text-white">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
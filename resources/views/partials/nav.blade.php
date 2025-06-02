<nav class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 shadow-lg mb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <a href="{{ route('home') }}" class="flex items-center text-white font-bold text-2xl">
                    Event-Manager
                </a>
            </div>
            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <button id="navbar-toggle" type="button" class="text-white focus:outline-none focus:ring-2 focus:ring-white">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path id="navbar-toggle-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <!-- Links -->
            <div class="hidden md:flex md:items-center md:space-x-4">
                <a href="{{ route('events.index') }}" class="text-white hover:bg-white/10 px-3 py-2 rounded-md font-semibold">Événements</a>
                <a href="{{ route('places.index') }}" class="text-white hover:bg-white/10 px-3 py-2 rounded-md font-semibold">Lieux</a>
                <a href="{{ route('participants.index') }}" class="text-white hover:bg-white/10 px-3 py-2 rounded-md font-semibold">Participants</a>
                <a href="{{ route('speakers.index') }}" class="text-white hover:bg-white/10 px-3 py-2 rounded-md font-semibold">Intervenants</a>
                <a href="{{ route('sponsors.index') }}" class="text-white hover:bg-white/10 px-3 py-2 rounded-md font-semibold">Sponsors</a>
                @auth
                    <span class="ml-4 text-white hidden sm:inline">
                        Connecté en tant que <span class="font-bold">{{ auth()->user()->name }}</span>
                    </span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="ml-3 bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow">
                            Déconnexion
                        </button>
                    </form>
                @endauth
            </div>
        </div>
        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden hidden mt-2 space-y-1">
            <a href="{{ route('events.index') }}" class="block text-white hover:bg-white/10 px-3 py-2 rounded-md font-semibold">Événements</a>
            <a href="{{ route('places.index') }}" class="block text-white hover:bg-white/10 px-3 py-2 rounded-md font-semibold">Lieux</a>
            <a href="{{ route('participants.index') }}" class="block text-white hover:bg-white/10 px-3 py-2 rounded-md font-semibold">Participants</a>
            <a href="{{ route('speakers.index') }}" class="block text-white hover:bg-white/10 px-3 py-2 rounded-md font-semibold">Intervenants</a>
            <a href="{{ route('sponsors.index') }}" class="block text-white hover:bg-white/10 px-3 py-2 rounded-md font-semibold">Sponsors</a>
            @auth
                <span class="block text-white px-3 py-2">Connecté en tant que <span class="font-bold">{{ auth()->user()->name }}</span></span>
                <form method="POST" action="{{ route('logout') }}" class="px-3 py-2">
                    @csrf
                    <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow">
                        Déconnexion
                    </button>
                </form>
            @endauth
        </div>
    </div>
    <!-- Menu burger JS -->
    <script>
        const toggleBtn = document.getElementById('navbar-toggle');
        const menu = document.getElementById('mobile-menu');
        if(toggleBtn && menu) {
            toggleBtn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        }
    </script>
</nav>
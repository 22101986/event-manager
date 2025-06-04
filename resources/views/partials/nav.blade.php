<nav class="main-navbar">
    <div class="navbar-container">
        <div class="navbar-inner">
            <div class="flex">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <img src="/logo.png" style="height: 75px; width: 75px;" alt="">
                </a>
            </div>
            <!-- Boutons menu mobil -->
            <div class="flex items-center md:hidden">
                <button id="navbar-toggle" type="button" class="navbar-toggle-btn">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path id="navbar-toggle-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <!-- Liens -->
            <div class="navbar-links">
                <a href="{{ route('events.index') }}" class="navbar-link">Événements</a>
                <a href="{{ route('places.index') }}" class="navbar-link">Lieux</a>
                <a href="{{ route('participants.index') }}" class="navbar-link">Participants</a>
                <a href="{{ route('speakers.index') }}" class="navbar-link">Intervenants</a>
                <a href="{{ route('sponsors.index') }}" class="navbar-link">Sponsors</a>
                @auth
                    <span class="ml-4 text-sky-300 hidden sm:inline">
                        Connecté en tant que <span class="font-bold">{{ auth()->user()->name }}</span>
                    </span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="navbar-logout-btn">
                            Déconnexion
                        </button>
                    </form>
                @endauth
            </div>
        </div>
        <!-- Menu mobile -->
        <div id="mobile-menu" class="md:hidden hidden mt-2 space-y-1">
            <a href="{{ route('events.index') }}" class="navbar-link-mobile">Événements</a>
            <a href="{{ route('places.index') }}" class="navbar-link-mobile">Lieux</a>
            <a href="{{ route('participants.index') }}" class="navbar-link-mobile">Participants</a>
            <a href="{{ route('speakers.index') }}" class="navbar-link-mobile">Intervenants</a>
            <a href="{{ route('sponsors.index') }}" class="navbar-link-mobile">Sponsors</a>
            @auth
                <span class="block text-white px-3 py-2">Connecté en tant que <span class="font-bold">{{ auth()->user()->name }}</span></span>
                <form method="POST" action="{{ route('logout') }}" class="px-3 py-2">
                    @csrf
                    <button type="submit" class="navbar-logout-btn-mobile">
                        Déconnexion
                    </button>
                </form>
            @endauth
        </div>
    </div>
    <!-- Menu burger JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('navbar-toggle');
            const menu = document.getElementById('mobile-menu');
            if(toggleBtn && menu) {
                toggleBtn.addEventListener('click', () => {
                    menu.classList.toggle('hidden');
                });
            }
        });
</script>
</nav>
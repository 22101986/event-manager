<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Accueil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('events.index') }}">Événements</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('places.index') }}">Lieux</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('participants.index') }}">Participants</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('speakers.index') }}">Intervenants</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('sponsors.index') }}">Sponsors</a></li>
            </ul>

            @auth
                <span class="navbar-text me-2">
                    Connecté en tant que {{ auth()->user()->name }}
                </span>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-primary text-light m-2">Déconnexion</button>
                </form>
            @endauth
        </div>
    </div>
</nav>
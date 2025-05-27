<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Accueil</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('events.index') }}">Événements</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('places.index') }}">Lieux</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('participants.index') }}">Participants</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('speakers.index') }}">Intervenants</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('sponsors.index') }}">Sponsors</a></li>
            </ul>
        </div>
        
        <div class="navbar-text">
            @auth
                Connecté en tant que {{ auth()->user()->name }}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary text-light">Déconnexion</button>
                </form>
                 @else
                <a href="{{ route('login') }}" class="btn btn-primary text-light">Connexion</a>
            @endauth
        </div>
    </div>
</nav>
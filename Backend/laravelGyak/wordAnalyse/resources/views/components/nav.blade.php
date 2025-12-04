<nav class="navbar mb-3" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ route('pages.home') }}">
            <span>✌️😝</span>
            <h1 class="is-size-4">Főoldal</h1>
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a href="{{ route('pages.about') }}" class="navbar-item">
                Leírás
            </a>
            <a href="{{ route('pages.word', 'Alapérték') }}" class="navbar-item">
                Szövegelemzés
            </a>
        </div>
    </div>
</nav>

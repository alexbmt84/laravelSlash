<header>

    <img class="logo" src="img/logo.png" alt="logo">

    @if( auth()->check() )

        <h2>Bienvenue {{ auth()->user()->pseudo }}</h2>

    @endif

    <p>Que voulez vous faire ?</p>

</header>
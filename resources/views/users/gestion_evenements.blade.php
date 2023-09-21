<!doctype html>

    <html lang="fr">

        <head>
            <title>Mes Projets</title>
            <link rel="shortcut icon" type="image/png" href="img/img_accueil.png" />
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="css/events.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" defer></script><script  src="js/doughnut.js" defer></script>
        </head>

        <body>

            <main class="main mb-50">

                <h2><span class="hello">Bienvenue, </span><br>{{ auth()->user()->pseudo }} !</h2>

                <h1>Gestion des projets </h1>

                <div class="hevent">
                    <h3>Ma liste de projets</h3>
                    <a class="btnTasks" href="/gestion_taches">Toutes mes tâches</a>
                </div>

                @foreach($metiers as $metier)

                    <div id="event" style= "background-color:<?= $metier->couleur?>;">

                            <div class="events">

                                <p class="recetteTitle">Evénements</p>

                                @foreach($metier->evenements as $event)
                                    <a class="eventLink" href="/gestion_taches/{{ $event->id  }}">
                                        <p class="itemName skeleton-loader">{{$event->nom_evenement}}</p>
                                    </a>

                                @endforeach

                                <div class="liens">
                                    <a class="btnEvent" href="/evenements">Ajouter un événement</a>
                                    <a class="btnEvent" href="/taches">Ajouter une tâche</a>
                                </div>

                            </div>

                        <div class="metier">
                            <p class="recetteTitle">Metier</p>
                            <p class="itemName">{{$metier->nom}}</p>
                            <div class="jobimg" style= 'background-image: url("{{$metier->icone}}");'></div>
                            <a class="btnEvent" href="/metiers">Ajouter un métier</a>
                        </div>

                        <div class="recette">

                            <p class="recetteTitle">Recettes</p>

                            @foreach($metier->evenements as $evenement)

                                <p class="recetteTitle">{{$evenement->nom_evenement}}</p>
                                <p class="recetteTotal">Total : {{ $evenement->recettes->sum('recette') }} €</p>

                                @foreach($evenement->recettes as $recette)
                                    <p class="recetteAmount">{{$recette->recette}} €</p>
                                @endforeach

                            @endforeach

                            <a class="btnEvent2" href="/recette">Modifier</a>

                        </div>

                        <div class="depense">

                            <p class="recetteTitle">Dépenses</p>

                            @foreach($metier->evenements as $evenement)

                                <p class="recetteTitle">{{$evenement->nom_evenement}}</p>
                                <p class="recetteTotal">Total : {{ $evenement->recettes->sum('depense') }} €</p>

                                @foreach($evenement->recettes as $recette)
                                    <p class="recetteAmount">{{$recette->depense}} €</p>
                                @endforeach

                            @endforeach

                            <a class="btnEvent2" href="/recette">Modifier</a>

                        </div>

                    </div>

                @endforeach

                @include("includes.footer")

            </main>

        </body>

    </html>

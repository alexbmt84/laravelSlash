<!doctype html>

    <html lang="fr">

        <head>
            <title>Plannification</title>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="../css/doughnut.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" defer></script><script  src="../js/doughnut.js" defer></script>
        </head>

        <body>

            <main class="main">

                <h2><span class="hello">Bienvenue, </span><br>{{ auth()->user()->pseudo }} !</h2>

                <h1>Planification</h1>

                <section class="chart" id="chartContainer">

                    <figure class="chart__figure" id="chart__figure">
                        <canvas class="chart__canvas rouge" id="chartCanvas" width="160" height="160" aria-label="doughnutChart" role="img"></canvas>
                        <figcaption class="chart__caption">
                            Excellent ! <span>Vous êtes sur la bonne voie !</span>
                        </figcaption>
                    </figure>

                </section>

                <div class="event">
                    <h3>Tâches du jour</h3>
                </div>

                <div class="eventGrid">

                    @foreach($taches as $tache)

                        <div class="tache tache-pro" style= "background-color:{{$tache->evenement->metier->couleur}};">

                            <p class="metier-title">{{$tache->evenement->metier->nom}}</p>
                            <p class="event-title">{{$tache->evenement->nom_evenement}}</p>

                            <div class="cadreMetier">
                                <img class="img-metier" src="../{{$tache->evenement->metier->icone}}" alt="">
                            </div>

                            <p class="text-tache">{{$tache->label}}</p>

                            <div class="cadreTache">
                                <img class="img-tache" src="../{{$tache->image}}" alt="">
                            </div>

                            <p class="date-tache">{{$tache->date_debut}}</p>

                            <div class="etat">

                                <i class="fa-regular fa-circle-play"></i>
                                <i class="fa-regular fa-circle-pause"></i>
                                <i class="fa-regular fa-circle-stop"></i>

                            </div>

                        </div>

                    @endforeach

                </div>

                @include("includes.footer")

            </main>

        </body>

    </html>

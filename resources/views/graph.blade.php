<!doctype html>

    <html lang="en">

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <title>Generated Pdf</title>
            <link rel="stylesheet" href="./css/pdf.css">
        </head>

        <body>

        <main>

            <h1 style="text-align: center; ">Generated PDF</h1>

            <h2 style="text-align: center;">Métiers</h2>

            <div class="mainContainer">

                @foreach($metiers as $metier)

                    <div class="metierPdf">

                        <h3 class="jobName" style="text-align: center;">{{ $metier->nom }}</h3>

                        <h4 class="events" style="text-align: center;">Evénements</h4>

                        @foreach($metier->evenements as $evenement)

                            <h4 class="eventName" style="text-align: center;">{{ $evenement->nom_evenement  }}</h4>

                            <p class="recettesTitle">Recettes</p>
                            <p class="recettes">{{ $evenement->recettes->sum('recette') }} €</p>

                            <h4 class="events">Tâches</h4>

                            @foreach($evenement->taches as $tache)

                                <h5 class="taskLabel">{{$tache->label}}</h5>

                            @endforeach

                        @endforeach

                    </div>

                @endforeach

            </div>

        </main>

        </body>

    </html>

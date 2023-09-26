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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

                @if($evenement)

                    <div class="event">
                        <h3>{{ $evenement[0]->nom_evenement }} - Tâches du jour</h3>
                    </div>

                @else

                    <div class="event">
                        <h3>Tâches du jour</h3>
                    </div>

                @endif

                <div class="eventGrid">

                    @foreach($taches as $tache)

                        <div class="tache tache-pro" style= "background-color:{{$tache->evenement->metier->couleur}};">

                            <p class="metier-title">{{$tache->evenement->metier->nom}}</p>
                            <p class="event-title">{{$tache->evenement->nom_evenement}}</p>

                            <div class="cadreMetier">
                                <img class="img-metier" src="../{{$tache->evenement->metier->icone}}" alt="">
                            </div>

                            <p class="text-tache">{{$tache->label}}</p>
                            <p class="date-tache">Créée {{ $tache->timeCalendar()   }}</p>

                            <div class="cadreTache">
                                <img class="img-tache" src="../{{$tache->image}}" alt="">
                            </div>

                            @if($tache->etat !== 0)

                                <p class="date-tache">Statut : En cours</p>

                            @elseif($tache->ended_at)

                                <p class="date-tache">Statut : Terminée</p>

                            @else

                                <p class="date-tache">Statut : En pause</p>

                            @endif

                            <p class="date-tache">Temps : {{ $tache->getFormattedTime()  }} heures</p>

                            <div class="etat">


                                <button class="stateBtn" data-action="play" data-id="{{ $tache->id }}">

                                    <i class="fa-regular fa-circle-play"></i>

                                </button>


                                <button class="stateBtn" data-action="pause" data-id="{{ $tache->id }}">

                                    <i class="fa-regular fa-circle-pause"></i>

                                </button>


                                <button class="stateBtn" data-action="end" data-id="{{ $tache->id }}">

                                    <i class="fa-regular fa-circle-stop"></i>

                                </button>

                            </div>

                        </div>

                    @endforeach

                </div>

                @include("includes.footer")

            </main>

        <script>

            $(document).ready(function() {

                $('.stateBtn').on('click', function(e) {

                    e.preventDefault();

                    const action = $(this).data('action');
                    const taskId = $(this).data('id');

                    $.ajax({

                        url: `/${action}/${taskId}`,
                        method: 'POST',
                        data: { _token: '{{ csrf_token() }}' },

                        success: function(response) {
                            location.reload();
                        },

                        error: function(error) {
                            console.log(error);
                            alert('Une erreur est survenue.');
                        }

                    });

                });

            });

        </script>

        </body>

    </html>

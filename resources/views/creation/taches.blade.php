<!DOCTYPE html>

    <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Formulaire évènements</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="css/events.css">
            <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="crossorigin="anonymous" defer></script>
            <script src="js/photo.js" defer></script>
        </head>

        <body>

            <h2><span class="hello">Bienvenue, </span><br>{{ auth()->user()->pseudo }} !</h2>

            <h1>Taches</h1>

            <div class="modal-wrap">

                <div class="modal-header"><span class="is-active bg_bleu"></span><span></span><span></span></div>

                <div class="modal-bodies">

                    <div class="modal-body modal-body-step-1 is-showing">

                        <div class="title bleu">Configurez votre tache</div>

                        <form action="/taches" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="profile-pic">

                                <label for="file" class="-label">
                                    <span class="glyphicon glyphicon-camera"></span>
                                    <span>Change Image</span>
                                </label>

                                <input id="file" type="file" name="image_tache" onchange="loadFile(event);"/>
                                <img src="img/taches.png" id="output" width="50px" />

                            </div>

                            <select name="select-event" id="metier">
                                @foreach($events as $event)
                                    <option name='event' class='center-box' value='{{$event->id}}'>{{$event->nom_evenement}}</option>
                                @endforeach
                            </select>

                            <input type="text" id="nomTache" name="nom_tache" placeholder="Nom de la tache" />

{{--                            <div class="title bleu">Début prévu : <input type="datetime-local" name="dateDebut" id="dateDebut" value="" required></div>--}}

                            <div class="text-center">
                                <button class="button" type="submit">Continuer</button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

            <div class="text-center">
                <div class="rerun-button">Créer un nouvel évènement</div>
            </div>

            @include("includes.footer")

        </body>

    </html>

<!DOCTYPE html>

    <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Formulaire évènements</title>
            <link rel="stylesheet" href="css/events.css">
            <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        </head>

        <body>

            <h2><span class="hello">Bienvenue, </span><br>{{ auth()->user()->pseudo }} !</h2>

            <h1>évènements</h1>

            <div class="modal-wrap">

                <div class="modal-header"><span class="is-active bg_orange"></span><span></span><span></span></div>

                <div class="modal-bodies">

                    <div class="modal-body modal-body-step-1 is-showing">

                        <div class="title orange">Créez votre d'évènement</div>

                        <form action="/evenements" method="POST">

                            @csrf

                            <input type="text" id="nomEvenement" name="nomEvenement" placeholder="Nom de l'évènement" />
                            <input type="text" id="nomClient"  name="nomClient" placeholder="Nom du client" />
                            <textarea id="commentaires" name="commentaire" placeholder="Commentaires"></textarea>

                            <h3 class="metier-title" >Choisissez le metier lié à ce projet :</h3>

                            <select name="select-metier" id="metier">

                                @foreach ($metiers as $metier)
                                    <option name='metier' class='center-box' value='{{$metier->id}}'>{{$metier->nom}}</option>
                                @endforeach

                            </select>

                            <div class="text-center fade-in">
                                <button class="button" type="submit">Créer un Evénement</button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>


            @include("includes.footer")

        </body>

    </html>

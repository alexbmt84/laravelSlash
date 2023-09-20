<!DOCTYPE html>

    <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Formulaire métier</title>
            <link rel="stylesheet" href="./css/events.css">
            <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        </head>

        <body>

            <h2><span class="hello">Bienvenue, </span><br>{{ auth()->user()->pseudo }} !</h2>

            <h1>Métier</h1>

            <div class="modal-wrap">

                <div class="modal-header"><span class="is-active bg_rouge"></span><span></span><span></span></div>

                <div class="modal-bodies">

                    <div class="modal-body modal-body-step-1 is-showing">

                        <div class="title rouge">Créer un métier</div>

                            <form action="/metiers" method="POST" enctype="multipart/form-data">

                                @csrf

                                <label class="type type_couleur">

                                    <input type="radio" id="couleur1" name="radio" value="#EB684D"checked/><div class="color"></div>
                                    <input type="radio" id="couleur2" name="radio" value="#FF922B"/><div class="color"></div>
                                    <input type="radio" id="couleur3" name="radio" value="#FFD43B"/><div class="color"></div>
                                    <input type="radio" id="couleur4" name="radio" value="#48cc5e"/><div class="color"></div>
                                    <input type="radio" id="couleur5" name="radio" value="#0099FF"/><div class="color"></div>
                                    <input type="radio" id="couleur6" name="radio" value="#3BC9DB"/><div class="color"></div>
                                    <input type="radio" id="couleur7" name="radio" value="#B2F2BB"/><div class="color"></div>
                                    <input type="radio" id="couleur8" name="radio" value="#a374cf"/><div class="color"></div>
                                    <input type="radio" id="couleur9" name="radio" value="#ff57ab"/><div class="color"></div>
                                    <input type="radio" id="couleur10" name="radio" value="#CDA680"/><div class="color"></div>
                                    <input type="radio" id="couleur11" name="radio" value="#6fadcb"/><div class="color"></div>
                                    <input type="radio" id="couleur12" name="radio" value="#707070"/><div class="color"></div>
                                </label>

                                <input type="text" id="nomMetier" name="nomMetier" placeholder="Nom du métier" />
                                <input type="radio" id="sphere_pro" name="radio_sphere" value="1" checked/>Professionel
                                <input type="radio" id="sphere_perso" name="radio_sphere" value="2"/> Personnel
                                <label class="label_metier" for="image_metier">Choisissez une image pour le métier :</label>
                                <input type="file" id="image_metier" name="image_metier"/>

                                <div class="text-center">
                                    <button class="button" type="submit">Continuer</button>
                                </div>

                            </form>

                    </div>

                </div>

            </div>

            <div class="text-center">
                <div class="rerun-button">Créer un noueau métier</div>
            </div>

            @include("includes.footer")

        </body>

    </html>

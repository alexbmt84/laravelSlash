<!DOCTYPE html>

    <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Création des metiers</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="./css/main.css">
            <link rel="stylesheet" href="./css/creation.css">
        </head>

        <body>

            @if( auth()->check() )
            
            <h2><span class="hello">Bienvenue, </span><br>{{ auth()->user()->pseudo }} !</h2>
            
            @endif
            
            <h1>Gérer votre travail !</h1>

            <div class="flex_center flex_column">

                <div class="card_creat" id="metier">
                    <div class="etape"><h2 class="number">1</h2></div>
                    <h2>Créer un métier :</h2>
                    <p>Si vous avez déjà créé votre métier, vous pouvez passer à l'étape 2.</p>
                    <img src="img/jobs.png" alt="">
                    <a class="link" href="/metiers">commencer !</a>
                </div>

                <div class="card_creat" id="evenement">
                    <div class="etape"><h2 class="number">2</h2></div>
                    <h2>Créer un projet :</h2>
                    <p>Si vous avez déjà créé votre projet, vous pouvez passer à l'étape 3.</p>
                    <img src="img/projets.png" alt="">
                    <a class="link" href="/evenements">commencer !</a>
                </div>

                <div class="card_creat" id="tache">
                    <div class="etape"><h2 class="number">3</h2></div>
                    <h2>Ajouter des tâches :</h2>
                    <p>Ici, vous allez pouvoir ajouter des tâches à votre projet.</p>
                    <img src="img/taches.png" alt="">
                    <a class="link" href="/taches">commencer !</a>
                </div>

                <div class="card_creat" id="tache">
                    <div class="etape"><h2 class="number">4</h2></div>
                    <h2>Dépenses et recettes :</h2>
                    <p>Ici, vous allez pouvoir ajouter des dépenses et recettes à votre projet.</p>
                    <img src="img/recette.png" alt="">
                    <a class="link" href="/recette">commencer !</a>
                </div>

            </div>
        
        </body>

        @include('includes.footer')

    </html>
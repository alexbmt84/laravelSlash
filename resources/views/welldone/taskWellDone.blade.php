<!doctype html>

    <html lang="fr">

        <head>
            <title>Well done !</title>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="css/app.css">

        </head>

        <body>

        <main class="main">

            <h2><span class="hello">Bienvenue, </span><br>{{ auth()->user()->pseudo }} !</h2>

            <img class="redsuccess" src="img/Successmarkblue.png" alt="">

            <h3>Votre tâche à été créée !</h3>

            <button id="btn-blue" class="btnAddTask" onclick="window.location.href='/recette';">Ajouter des recettes/dépenses</button>
            <button id="btn-blue1" class="btnAddTask" onclick="window.location.href='/creation';">Retour</button>

            <img class="welldone" src="img/taskwelldone.png" alt="">

        </main>

        @include('includes.footer')

        </body>

    </html>

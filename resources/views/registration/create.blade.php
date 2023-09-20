<!DOCTYPE html>

    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Register</title>
            <link rel="stylesheet" href="./css/login.css">
        </head>

        <body>
            
            <main>

                <img class="logo" src="img/logo.png" alt="">
                <form action="/register" class="form" method="POST">

                    @csrf


                    <h2>Bienvenue sur Slash!</h2> 

                    <input class="text" type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required>      
                    <input class="text" type="email" id="email" name="email" placeholder="Entrez votre email" required>
                    <input class="text" type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>      
                    <input class="text" type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmez votre mot de passe" required>
                    <button class="btn" type="submit"><label for="">Inscription</label></button>
                    
                </form>

                <p>Vous avez déjà un compte ? <a href="/login">Connexion</a></p>

            </main>

        </body>

    </html>
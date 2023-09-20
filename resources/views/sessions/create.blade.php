<!DOCTYPE html>

    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Login</title>
            <link rel="stylesheet" href="./css/login.css">
        </head>

        <body>

            <main>

                <img class="logo" src="img/logo.png" alt="">

                <h1>Bonjour!<br>Heureux de vous voir sur Slash!</h1>

                <form action="/login" class="form" method="post">

                    @csrf

                    <input class="text" type="email" name="email" placeholder="Entrez votre email" required>      
                    <input class="text" type="password" name="password" placeholder="Entrez votre mot de passe" required>
                    <button class="btn" type="submit">Connexion</button>

                    <label id="forgot">Mot de passe oublié</label>
                    <p>Vous n'avez pas de compte ? <a href="/register">Inscription</a></p>

                </form>

            </main>

        </body>

    </html>
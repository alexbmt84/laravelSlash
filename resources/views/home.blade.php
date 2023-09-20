<!DOCTYPE html>

    <html lang="fr">

        <head>

            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Home</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.145.0/three.min.js" integrity="sha512-mElAVmOZp/n8OKao194p++kIARCbLKnf/pdVTVI+ZkxL0Rmyw6p5C4kcLd67l2WdvfyBqFe6dI4lR3m++xhdnA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <link rel="stylesheet" href="./css/main.css">

        </head>

        <body>

            @include('includes.header')

            <main>

                @include('includes.polygon')

            </main>

            @include('includes.footer')

        </body>

    </html>

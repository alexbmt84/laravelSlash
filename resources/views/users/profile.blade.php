<!DOCTYPE html>

    <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Formulaire évènements</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
            <link rel="stylesheet" href="./css/doughnut.css">
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js' defer></script><script  src="./script.js" defer></script>
        </head>

        <body>

            @if( auth()->check() )
            
            <h2><span class="hello">Bienvenue, </span><br>{{ auth()->user()->pseudo }} !</h2>
            
            @endif
            
            <h1>Profile</h1>

            <form class="formEdit" action="/profile" method="POST" enctype="multipart/form-data">  

                @csrf
                
                @if( auth()->user()->avatar )

                    <div class="profile-pic">
                        
                        <label for="file" class="-label">
                            <span class="glyphicon glyphicon-camera"></span>
                            <span>Change Image</span>
                        </label>
                        
                        <input id="file" type="file" name="avatar" onchange="loadFile(event);"/>
                        
                        <img src="{{asset(auth()->user()->avatar)}}" alt="My Test Image" id="output" width="150px" />
                        
                    </div>

                @endif

                    <input class="text-input1" type="text" name="newpseudo" placeholder="Pseudo" value="{{ auth()->user()->pseudo }}">
                    <input class="text-input3" type="email" name="newmail" placeholder="Email" value="{{ auth()->user()->email }}">
                    <input class="text-input3" type="password" name="newmdp1" placeholder="New password">
                    <input class="text-input3" type="password" name="newmdp2" placeholder="Confirm your password">
                    <input id="btn2" class="inputSubmit" type="submit" value="Update">  

            </form>

            @include('includes.alert')

            @include('includes.footer')

        </body>

        <script src="./js/photo.js" defer></script>

    </html>
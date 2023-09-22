<!doctype html>

    <html lang="en">

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <title>Generated Pdf</title>
        </head>

        <body>

        <h1 style="text-align: center; ">Generated PDF</h1>

        <h2 style="text-align: center;">Métiers</h2>

        @foreach($metiers as $metier)

            <h3 style="text-align: center;">{{ $metier->nom }}</h3>

            <h4 style="text-align: center;">Evénements</h4>

            @foreach($metier->evenements as $evenement)

                <h4 style="text-align: center;">{{ $evenement->nom_evenement  }}</h4>

            @endforeach


        @endforeach

        </body>

    </html>

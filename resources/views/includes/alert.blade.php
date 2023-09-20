@if (Session::has('success'))

    <div class="alert alert-success" role="alert" style="font-size:24px; margin-top:25px;">

        <strong>Success !</strong> {{ session('success') }}

    </div>

@endif

@if (Session::has('error'))

    <div class="alert alert-danger" role="alert" style="font-size:24px; margin-top:25px;">

        <strong>Error !</strong> {{ session('error') }}

    </div>

@endif
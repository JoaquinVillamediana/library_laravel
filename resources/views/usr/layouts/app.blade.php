<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ Session::token() }}">
        <title>Biblioteca</title>
        <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
        <!-- Bootstrap core CSS-->
        <!--<link rel="stylesheet" href="/vendor/bootstrap.min.css" crossorigin="anonymous">-->
        <script src="/vendor/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
        <link href="/vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">   
        <link rel="stylesheet" href="/css/frontend/general.css" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,700&display=swap" rel="stylesheet">
        <script src="/js/frontend/general.js"></script>
    </head>


    <body>

        @yield('content')

        <!-- Bootstrap core JavaScript-->
        <!--<script src="/vendor/popper.min.js" crossorigin="anonymous"></script>-->
        <!--<script src="/vendor/bootstrap.min.js" crossorigin="anonymous"></script>-->

        <!-- Core plugin JavaScript-->
        <script src="/vendor/jquery.easing.compatibility.js" crossorigin="anonymous"></script>

    </body>
</html>
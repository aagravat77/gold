@extends('Admin.Admin_link')
@section('Admin_section')
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>Gold Hallmarking Management System</title> --}}
        {{-- <link rel="icon" type="image/gif/png" href="web_images/title_image.png"> --}}

        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <title>Admin | Gold Hallmarking Management System</title>
        <link rel="icon" type="image/gif/png" href="web_images/title_image.png">
        <!-- Scripts -->
        {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    </head>

    <body>
        <div class="container">
            <center>
                @include('flash-message')
            </center>
        </div>

        <div id="app">

            <main class="py-1">
                @yield('Admin_section')
            </main>
        </div>

        
                <div class="col py-3">


                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header">Active Users</div>
                        <div class="card-body">
                            <h1 class="card-title"> {{$users}} </h1>
        

                        </div>
                    </div>

                </div>

            </div>
        </div>

        <script>
            $( '#topheader .navbar-nav a' ).on( 'click', function () {
	$( '#topheader .navbar-nav' ).find( 'li.active' ).removeClass( 'active' );
	$( this ).parent( 'li' ).addClass( 'active' );
});
        </script>

    </body>

    </html>
@endsection

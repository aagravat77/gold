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
        {{-- <div class="container">
            <center>
                @include('flash-message')
            </center>
        </div> --}}

        <div id="app">

            <main class="py-1">
                @yield('Admin_section')
            </main>



            <div class="container">
                <div class="row row-cols-7 row-cols-md-5">
                    <div class="col">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <center>
                                <div class="card-header">Active Users</div>
                            </center>
                            <div class="card-body">
                                <center>
                                    <h1 class="card-title">{{$users}}</h1>
                                </center>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <center>
                                <div class="card-header">Total Orders</div>
                            </center>
                            <div class="card-body">
                                <center>
                                    <h1 class="card-title">{{$orders}}</h1>
                                </center>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <center>
                                <div class="card-header">Pending Orders</div>
                            </center>
                            <div class="card-body">
                                <center>
                                    <h1 class="card-title">{{$orders_pending}}</h1>
                                </center>
                            </div>
                        </div>
                    </div>



                    <div class="col">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <center>
                                <div class="card-header">Complete Orders</div>
                            </center>
                            <div class="card-body">
                                <center>
                                    <h1 class="card-title">{{$orders_complete}}</h1>
                                </center>
                            </div>
                        </div>
                    </div>


                    <div class="col">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <center>
                                <div class="card-header">Payment Complete</div>
                            </center>
                            <div class="card-body">
                                <center>
                                    <h1 class="card-title">{{$pay}}</h1>
                                </center>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <center>
                                <div class="card-header">Center Id</div>
                            </center>
                            <div class="card-body">
                                <center>
                                    <h4 class="card-title">AGR7214AVAT99</h4>
                                </center>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </div>



    </body>

    </html>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection

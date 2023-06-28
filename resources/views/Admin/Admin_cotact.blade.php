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

            <div class="card text-center shadow p-0 mb-5 bg-body rounded">
                <div class="card-header">
                    <h2><i class="bi bi-chat-left-dots-fill"></i> Manage Contact</h2>
                </div>
                <div class="card">
                    <div class="badge  text-wrap" style="width: 13rem;">
                        <a href="{{route('admin_download_contact')}}">
                        <button type="submit" class="btn btn-outline-danger"><i class="bi bi-download"></i>&nbsp; Download
                            Excel File</button>
                            </a>
                    </div>

                    <div class="table-responsive-sm p-2 bg-light border">
                        <table class="table table-bordered">
                            <thead class="table table-info table-striped">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>


                                    @foreach ($users as $data)
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th scope="row">{{ $data->name }}</th>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->message }}</td>
                                    <td>

                                        <a href="#">
                                            <input type="submit" name="submit" value="Edit" class="btn btn-primary">
                                        </a>

                                    </td>
                                    <td>
                                        <a href="deletecon/{{ $data->id }}">
                                            <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                                        </a>
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br><br><br>
                </div>
            </div>
        </div>



    </body>

    </html>
@endsection

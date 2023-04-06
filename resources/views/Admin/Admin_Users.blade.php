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
                    <h1>MANAGE USERS</h1><BR></BR>
                    <div class="table-responsive-sm">
                        <table class="table table-bordered">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Email_verified</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updates At</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>


                                    @foreach ($users as $data)
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th scope="row">{{ $data->name }}</th>
                                    <td>{{ $data->number }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->repeat_password }}</td>

                                    <th scope="row">{{ $data->email_verified_at }}</th>
                                    <td>{{ $data->role }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->updated_at }}</td>
                                    <td>

                                        <a href="edit/{{ $data->id }}">
                                            <input type="submit" name="submit" value="Edit" class="btn btn-primary">
                                        </a>

                                    </td>
                                    <td>
                                        <a href="delete/{{ $data->id }}">
                                            <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                                        </a>
                                    </td>
                                    @endforeach
                                    <script>
                                        $('#ordersubmitform').submit(function() {
                                            $('input[type=submit]').addClass("disabled");
                                        });
                                    </script>
                                </tr>
                            </tbody>
                        </table>
                    </div><br><br><br><br><br>
                   



    </body>

    </html>
@endsection

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
                    <h2><i class="bi bi-briefcase-fill"></i> Manage Party</h2>
                </div>
                <div class="card">
                    <div class="badge  text-wrap" style="width: 13rem;">
                         <a href="{{route('admin_download_party')}}">
                        <button type="submit" class="btn btn-outline-danger"><i class="bi bi-download"></i>&nbsp; Download
                            Excel File</button>
                            </a>
                    </div>

                    <div class="table-responsive-sm p-2 bg-light border">
                        <table class="table table-bordered">
                            <thead class="table table-info table-striped">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Party Id</th>
                                    <th scope="col">Party Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">License Image</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Party Logo</th>
                                    <th scope="col">status</th>


                                    <th scope="col">Action</th>


                                    @foreach ($party as $data)
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <th scope="row">{{ $data->party_id }}</th>
                                    <td>{{ $data->party_name }}</td>
                                    <td>{{ $data->date }}</td>
                                    <td><img src="{{ asset('public/License_images/' . $data->bis_license_image) }}"width="120px"
                                            hight="120px" class="rounded-0" /></td>
                                    <td>{{ $data->address }}</td>
                                    <td><img src="{{ asset('public/Party_logo/' . $data->party_logo) }}"width="120px"
                                            hight="120px" class="rounded-3" /></td>
                                    <td>{{ $data->status }}</td>

                                    <td>
                                        @if ($data->status == 'Not Approved')
                                            <a href="approve_party/{{ $data->id }}">
                                                <input type="submit" name="submit" value="Approve"
                                                    class="btn btn-success">
                                            </a>&nbsp;&nbsp;&nbsp;
                                            <a href="edit_party/{{ $data->id }}">
                                                <input type="submit" name="submit" value="Edit"
                                                    class="btn btn-primary">
                                            </a>&nbsp;&nbsp;&nbsp;
                                            <a href="party_delete/{{ $data->id }}">
                                                <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                                            </a>
                                        @elseif ($data->status == 'Approve')
                                            <input type="submit" name="submit" value="Approved" disabled
                                                class="btn btn-success">
                                        @else
                                            <a href="approve_party/{{ $data->id }}">
                                                <input type="submit" name="submit" value="Approve"
                                                    class="btn btn-success">
                                            </a>
                                        @endif


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

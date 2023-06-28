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
        {{-- <title>Admin | Gold Hallmarking Management System</title>
        <link rel="icon" type="image/gif/png" href="web_images/title_image.png"> --}}
        <!-- Scripts -->
        {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    </head>

    <body>






        <br>
        <br>

        <style>
            body {
                background-color: #d8d2c2;
            }

            .form-container {
                background-color: #FFF;
                border-radius: 10px;
                padding: 30px;
                margin-top: 50px;
            }

            .form-container h1 {
                text-align: center;
                color: #333;
                margin-bottom: 30px;
            }

            .form-container label {
                color: #333;
                font-weight: 600;
            }

            .form-container input {
                border-radius: 5px;
                padding: 10px;
                margin-bottom: 20px;
                border: none;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
            }

            .form-container input:focus {
                outline: none;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.5);
            }

            .form-container button {
                background-color: #FF5733;
                color: #FFF;
                border: none;
                border-radius: 5px;
                padding: 10px 20px;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
            }

            .form-container button:hover {
                background-color: #FF8D6B;
            }
        </style>
        <div class="container">
            <center>
                @include('flash-message')
            </center>
        </div>

        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12 ">
                    @foreach ($data as $item)
                        <form class="form-container bg-light" method="POST" action="{{ route('admin.post_user_profile') }}">
                            @csrf
                            <center>
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <img src="https://img.freepik.com/premium-vector/head-lion-gold-logo_177315-80.jpg?w=2000"
                                    alt="Avatar Logo" style="width:200px;" class="rounded-circle">

                            </center>
                            <h1>Edit Profile</h1>

                            <div class="mb-3 ">
                                <label for="email">Name</label>
                                <input id="email" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $item->name }}" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password">Number</label>
                                <input id="password" type="number"
                                    class="form-control @error('number') is-invalid @enderror" name="number"
                                    value="{{ $item->number }}">

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password">Email</label>
                                <input id="password" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ $item->email }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            

                            <div class="mb-3">
                                <label for="password">Status</label>
                                <select name="status" class="form-select" aria-label="Default select example">
                                    <option value="Active" {{ $item->status == 'Active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="Deactive" {{ $item->status == 'Deactive' ? 'selected' : '' }}>Deactive
                                    </option>
                                </select>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit Profile') }}
                                </button>
                                <hr>


                            </div>
                    @endforeach
                    </form>
                </div>
            </div>
        </div>
        <br><br>



    </body>

    </html>
@endsection

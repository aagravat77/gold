@extends('Admin.Admin_link')
@section('Admin_section')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
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

        @foreach ($party as $data)
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12 ">
                        <form class="form-container bg-light" enctype="multipart/form-data" method="POST"
                            action="{{ route('admin.party_edit') }}">
                            @csrf
                            <center>
                                <input type="hidden" name="email" value="{{ $data->id }}">
                                <img src="https://img.freepik.com/premium-vector/head-lion-gold-logo_177315-80.jpg?w=2000"
                                    alt="Avatar Logo" style="width:200px;" class="rounded-circle">

                            </center>
                            <h1>Party Detail</h1>

                            <div class="mb-3 ">
                                <label for="party_name">Party Name</label>
                                <input id="party_name" type="text" value="{{ $data->party_name }}"
                                    class="form-control @error('party_name') is-invalid @enderror" name="party_name"
                                    value="{{ old('party_name') }}" autofocus>

                                @error('party_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pimage">Party License image</label>
                                <input id="bis_license_image" type="file" value="{{ $data->bis_license_image }}"
                                    class="form-control @error('bis_license_image') is-invalid @enderror" name="bis_license_image"
                                    value="{{ old('bis_license_image') }}" autofocus>

                                @error('bis_license_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <center>
                                <img src="{{ asset('public/License_images/' . $data->bis_license_image) }}"width="120px"
                                    hight="120px" class="rounded-0" />
                            </center><br>

                            <div class="mb-3 ">
                                <label for="address">Party Address</label>
                                <input id="address" type="text" value="{{ $data->address }}"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 ">
                                <label for="party_logo">Party logo</label>
                                <input id="party_logo" type="file" value="{{ $data->party_logo }}"
                                    class="form-control @error('party_logo') is-invalid @enderror" name="party_logo"
                                    value="{{ old('party_logo') }}" autofocus>

                                @error('party_logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <center>
                                <img src="{{ asset('public/Party_logo/' . $data->party_logo) }}"width="120px"
                                    hight="120px" class="rounded-0" />
                            </center><br>



                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                                <hr>


                            </div>

                        </form>
        @endforeach
        </div>
        </div>
        </div>
        <br><br>

    </body>

    </html>
@endsection

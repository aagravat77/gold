@extends('User_Link.User_link')
@section('user_section')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gold Hallmarking Management System</title>
<link rel="icon" type="image/gif/png" href="web_images/title_image.png">
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
                    <form class="form-container bg-light" method="POST" action="{{ route('user.change-pass') }}">
                        @csrf
                        <center>
                            <input type="hidden" name="email" value="{{Auth::user()->id}}">
                            <img src="https://img.freepik.com/premium-vector/head-lion-gold-logo_177315-80.jpg?w=2000"
                                alt="Avatar Logo" style="width:200px;" class="rounded-circle">

                        </center>
                        <h1>Change Password</h1>

                        <div class="mb-3 ">
                            <label for="email">Old Password</label>
                            <input id="email" type="password" class="form-control @error('old') is-invalid @enderror"
                                name="old" value="{{old('old')}}"  autofocus>

                            @error('old')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password">New Password</label>
                            <input id="password" type="text"
                                class="form-control @error('new') is-invalid @enderror" name="new" value="{{old('new')}}">

                            @error('new')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password">Repeat Password</label>
                            <input id="password" type="password"
                                class="form-control @error('con') is-invalid @enderror" name="con" value="{{old('con')}}">

                            @error('con')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Change Password') }}
                            </button>
                            <hr>

                            
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <br><br>

</body>
</html>

@endsection
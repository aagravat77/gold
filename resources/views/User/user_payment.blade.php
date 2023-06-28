@extends('User_Link.User_link')
@section('user_section')
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

        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12 ">
                    @foreach($data1 as $data)
                    <form class="form-container bg-light" enctype="multipart/form-data" method="POST" action="{{ route('user.payment_post') }}">
                        @csrf
                        <center>
                            <input type="hidden" name="email" value="{{ $data->item_id }}">
                            <img src="https://img.freepik.com/premium-vector/head-lion-gold-logo_177315-80.jpg?w=2000"
                                alt="Avatar Logo" style="width:200px;" class="rounded-circle">

                        </center>
                        <h1>Payment Detail</h1>

                        <div class="mb-3 ">
                            <label for="card_number">Card Numer</label>
                            <input id="card_number" type="number" class="form-control @error('card_number') is-invalid @enderror"
                                name="card_number" value="{{ old('card_number') }}"  autofocus>

                            @error('card_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="mb-3 ">
                            <label for="cvv">Cvv Number</label>
                            <input id="cvv" type="number" class="form-control @error('cvv') is-invalid @enderror"
                                name="cvv" value="{{ old('cvv') }}"  autofocus>

                            @error('cvv')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                         <div class="mb-3 ">
                            <label for="date">Date</label>
                            <input id="date" type="number" class="form-control @error('date') is-invalid @enderror"
                                name="date" value="{{ old('date') }}"  autofocus>

                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                         <div class="mb-3 ">
                            <label for="year">Year</label>
                            <input id="year" type="text" class="form-control @error('year') is-invalid @enderror"
                                name="year" value="{{ old('year') }}"  autofocus>

                            @error('year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                          <div class="mb-3 ">
                            <label for="addresws">Amount</label>
                            <input id="addrwess" type="number" class="form-control @error('addwress') is-invalid @enderror"
                                name="amount" value="{{ $data->total }}"  readonly autofocus>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                      

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit') }}
                            </button>
                            <hr>


                        </div>

                    </form>
                </div>
                @endforeach
            </div>
        </div>
        <br><br>

</body>
</html>
@endsection

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

        @foreach ($users2 as $data)
                <div class="container">
                    <div class="row justify-content-center ">
                        <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12 ">
                            <form class="form-container bg-light" enctype="multipart/form-data" method="POST" action="{{ route('user.order') }}">
                                @csrf
                                <center>
                                    <input type="hidden" name="email" value="{{ $data->party_id }}">
                                    <img src="https://img.freepik.com/premium-vector/head-lion-gold-logo_177315-80.jpg?w=2000"
                                        alt="Avatar Logo" style="width:200px;" class="rounded-circle">

                                </center>
                                <h1>Order</h1>

                                <div class="mb-3 ">
                                    <label for="item_name">Item name</label>
                                    <input id="item_name" type="text"
                                        class="form-control @error('item_name') is-invalid @enderror" name="item_name"
                                        value="{{ old('item_name') }}"  autofocus>

                                    @error('item_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="item_price">Item price</label>
                                    <input id="item_price" type="number" 
                                        class="form-control @error('item_price') is-invalid @enderror" name="item_price"
                                        value="{{ old('item_price') }}"  autofocus>

                                    @error('item_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 ">
                                    <label for="item_quantity">Item Quantity</label>
                                    <input id="item_quantity" type="number" 
                                        class="form-control @error('item_quantity') is-invalid @enderror" name="item_quantity"
                                        value="{{ old('item_quantity') }}"  autofocus>

                                    @error('item_quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 ">
                                    <label for="item_weight">Item Weight</label>
                                    <input id="item_weight" type="text" step="any"
                                        class="form-control @error('item_weight') is-invalid @enderror" name="item_weight"
                                        value="{{ old('item_weight') }}"  autofocus>

                                    @error('item_weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="item_image">Item Image</label>
                                    <input type="file" id="item_image" 
                                        class="form-control @error('item_image') is-invalid @enderror" name="item_image" 
                                        value="{{ old('item_image') }}">

                                    @error('item_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Order') }}
                                    </button>
                                    <hr>


                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <br><br>
        @endforeach
        <br>
    </body>

    </html>
@endsection


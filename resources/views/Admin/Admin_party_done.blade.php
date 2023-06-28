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

        @foreach ($order as $data)
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12 ">
                        <form class="form-container bg-light" enctype="multipart/form-data" method="POST"
                            action="{{ route('admin.order_edit_done') }}">
                            @csrf
                            <center>
                                 <input type="hidden" name="email" value="{{ $data->item_id }}">
                                <img src="https://img.freepik.com/premium-vector/head-lion-gold-logo_177315-80.jpg?w=2000"
                                    alt="Avatar Logo" style="width:200px;" class="rounded-circle">

                            </center>
                            <h1>Done Order</h1>

                            <div class="mb-3 ">
                                <label for="item_name">Item name</label>
                                <input id="item_name" type="text" value="{{ $data->item_name }}" readonly
                                    class="form-control @error('item_name') is-invalid @enderror" name="item_name"
                                    value="{{ old('item_name') }}" autofocus>

                                @error('item_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="item_price">Item price</label>
                                <input id="item_price" type="number" value="{{ $data->item_price }}" readonly
                                    class="form-control @error('item_price') is-invalid @enderror" name="item_price"
                                    value="{{ old('item_price') }}" autofocus>

                                @error('item_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 ">
                                <label for="item_quantity">Item Quantity</label>
                                <input id="item_quantity" type="number" value="{{ $data->item_quantity }}" readonly
                                    class="form-control @error('item_quantity') is-invalid @enderror" name="item_quantity"
                                    value="{{ old('item_quantity') }}" autofocus>

                                @error('item_quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 ">
                                <label for="item_weight">Item Weight</label>
                                <input id="item_weight" type="text" step="any" value="{{ $data->item_weight }}"
                                    readonly class="form-control @error('item_weight') is-invalid @enderror"
                                    name="item_weight" value="{{ old('item_weight') }}" autofocus>

                                @error('item_weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="fruits">Karat Rating</label>
                                <select name="purity" class="form-select" id="fruits" onchange="changeOption()" required>
                                    <option value=""></option>

                                    <option value="24k999">24k999</option>
                                    <option value="23k958">23k958</option>
                                    <option value="22k916">22k916</option>
                                    <option value="20k833">20k833</option>
                                    <option value="18k750">18k750</option>
                                    <option value="14k583">14k583</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="color">Percetange of Gold</label>
                                <select name="per" id="color"  class="form-select" required >
                                    <option  value="99.9%">99.9%</option>
                                    <option  value="95.8%">95.8%</option>
                                    <option  value="91.7%">91.7%</option>
                                    <option  value="83.3%">83.3%</option>
                                    <option  value="75.0%">75.0%</option>
                                    <option  value="58.3%">58.3%</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="color1">Percetange of other Metals</label>
                                <select id="color1" name="met" class="form-select">
                                    <option  value="1%">1%</option>
                                    <option  value="4.2%">4.2%</option>
                                    <option  value="8.3%">8.3%</option>
                                    <option  value="16.7%">16.7%</option>
                                    <option  value="25.0%">25.0%</option>
                                    <option  value="41.7%">41.7%</option>
                                </select>
                            </div>

                            <script>
                                function changeOption() {
                                    var fruitTag = document.getElementById("fruits");
                                    var colorTag = document.getElementById("color");

                                    if (fruitTag.value === "24k999") {
                                        colorTag.value = "99.9%";
                                    } else if (fruitTag.value === "23k958") {
                                        colorTag.value = "95.8%";
                                    } else if (fruitTag.value === "22k916") {
                                        colorTag.value = "91.7%";
                                    }else if (fruitTag.value === "20k833") {
                                        colorTag.value = "83.3%";
                                    }else if (fruitTag.value === "18k750") {
                                        colorTag.value = "75.0%";
                                    }else if (fruitTag.value === "14k583") {
                                        colorTag.value = "58.3%";
                                    }
                                }
                            </script>

                             <div class="mb-3 ">
                                <label for="item_weight">Hallmarking Charges</label>
                                <input id="item_weight" type="number" step="any" value="45" 
                                    readonly class="form-control @error('item_weight') is-invalid @enderror"
                                    name="charge" value="{{ old('item_weight') }}" autofocus>

                                @error('item_weight')
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
        @endforeach
        </div>
        </div>
        </div>
        <br><br>

    </body>

    </html>
@endsection

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

        <div class="container">
            <center>
                @include('flash-message')
            </center>
        </div>

        <div class="container">
            <center>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Congratulation!!</h4>
                    <p>Done!! Your company profile has been approved successfully.now you can able to give us a order.</p>
                    <hr>
                    <p class="mb-0">If you have any query regarding order then contact us.
                    </p>
                </div>
            </center>
        </div>

    </body>

    </html><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection

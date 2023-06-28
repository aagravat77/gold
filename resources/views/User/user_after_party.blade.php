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
                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Well done!!</h4>
                    <p>Thanks you!! you have successfully send your company details.after verifty your company details we can able to take your order.if we found something wrong then we can not able to take your order.and we reject you.after that you have to again fill your company details form.we can give you response within 2 hours.!!</p>
                    <hr>
                    <p class="mb-0">If you have any query than kindly contact us.
                    </p>
                </div>
            </center>
        </div>

    </body>

    </html><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection

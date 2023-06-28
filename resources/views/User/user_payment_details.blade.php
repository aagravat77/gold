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
        <div class="container">
            <center>
                @include('flash-message')
            </center>
        </div>
        <div class="col py-3">
            <h1>Order Details</h1><BR></BR>
            <div class="table-responsive-sm p-2 bg-light border">
                <table class="table table-bordered table table-striped ">
                    <thead class="table table-info table-striped">
                        <tr>
                            <th scope="col">Item Id</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Item Price</th>
                            <th scope="col">Item Quantity</th>
                            <th scope="col">Charges</th>
                            <th scope="col">Total price</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>


                            @foreach ($data as $data)
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>{{ $data->item_id }}</td>
                            <td>{{ $data->item_name }}</td>
                            <td>{{ $data->item_price }}</td>
                            <td>{{ $data->item_quantity }}</td>
                            <td>{{ $data->charges }}</td>
                            <td>{{ $data->amount }}</td>
                            <td>{{ $data->date }}</td>


                            <td>
                                @if ($data->status == 'Done')

                                    <a href="pdf_payment/{{ $data->item_id }}" target="_blank">
                                        <button type="submit" name="submit" value="Pdf" class="btn btn-danger"><i
                                                class="bi bi-file-earmark-pdf-fill"></i> Pdf</button>
                                    </a>
                                    @else   
                                    <button type="submit" name="submit" value="Pdf" disabled class="btn btn-danger">
                                        @endif

                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div><br><br>
    </body>

    </html>
@endsection

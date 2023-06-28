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
                    <h2><i class="bi bi-cart-check-fill"></i> Manage Order</h2>
                </div>
                <div class="card">
                    <div class="badge  text-wrap" style="width: 13rem;">
                        <a href="{{ route('admin_download_order') }}">
                            <button type="submit" class="btn btn-outline-danger"><i class="bi bi-download"></i>&nbsp;
                                Download
                                Excel File</button>
                        </a>
                    </div>

                    <div class="table-responsive-sm p-2 bg-light border">
                        <table class="table table-bordered">
                            <thead class="table table-info table-striped">
                                <tr>
                                    <th scope="col">party Name</th>
                                    <th scope="col">item id</th>
                                    <th scope="col">item name</th>
                                    <th scope="col">item price</th>
                                    <th scope="col">item quantity</th>
                                    <th scope="col">item weight</th>
                                    <th scope="col">item image</th>
                                    <th scope="col">date</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Action</th>


                                    @foreach ($users as $data)
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>{{ $data->party_name }}</td>
                                    <th scope="row">{{ $data->item_id }}</th>
                                    <td>{{ $data->item_name }}</td>
                                    <td>{{ $data->item_price }}</td>
                                    <td>{{ $data->item_quantity }}</td>
                                    <td>{{ $data->item_weight }}</td>
                                    <td><img src="{{ asset('public/order_item_image/' . $data->item_image) }}"width="120px"
                                            hight="120px" class="rounded-0" /></td>
                                    <td>{{ $data->date }}</td>
                                    <td>{{ $data->status }}</td>


                                    <td> 

                                        <a href="pdf_view_admin/{{ $data->item_id }}" target="_blank">
                                            <button type="submit" name="submit" value="Pdf" class="btn btn-danger"><i
                                                    class="bi bi-file-earmark-pdf-fill"></i> Pdf</button>
                                        </a> &nbsp;&nbsp;&nbsp;

                                        @if ($data->status == 'Not Approved')
                                            <a href="order_done/{{ $data->item_id }}">
                                                <input type="submit" name="submit" value="Done" class="btn btn-success">
                                            </a>
                                            &nbsp;&nbsp;

                                            <a href="edit_order/{{ $data->item_id }}">
                                                <input type="submit" name="submit" value="Edit" class="btn btn-primary">
                                            </a>
                                            &nbsp;&nbsp;

                                            <a href="delete_order/{{ $data->item_id }}">
                                                <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                                            </a>
                                        @else
                                        &nbsp;
                                            <input type="submit" name="submit" value="Complete" disabled
                                                class="btn btn-success">
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

<!DOCTYPE html>
<html>

<head>
    <title>GOLD HALLMARKING MANAGEMENT SYSTEM</title>
</head>
<style type="text/css">
    body {
        font-family: 'Roboto Condensed', sans-serif;
    }

    .m-0 {
        margin: 0px;
    }

    .p-0 {
        padding: 0px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .text-center {
        text-align: center !important;
    }

    .w-100 {
        width: 100%;
    }

    .w-50 {
        width: 50%;
    }

    .w-85 {
        width: 85%;
    }

    .w-15 {
        width: 15%;
    }

    .logo img {
        width: 200px;
        height: 60px;
    }

    .gray-color {
        color: #5D5D5D;
    }

    .text-bold {
        font-weight: bold;
    }

    .border {
        border: 1px solid black;
    }

    table tr,
    th,
    td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }

    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }

    table tr td {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
    }

    .box-text p {
        line-height: 10px;
    }

    .float-left {
        float: left;
    }

    .total-part {
        font-size: 16px;
        line-height: 12px;
    }

    .total-right p {
        padding-right: 20px;
    }
</style>

<body>
    @foreach ($data as $data)
        <div class="head-title">
            <h1 class="text-center m-0 p-0">GOLD HALLMARKING MANAGEMENT SYSTEM</h1>
        </div>
        <div class="add-detail mt-10">
            <div class="w-50 float-left mt-10">
                <p class="m-0 pt-5 text-bold w-100">Receipt Number - <span class="gray-color">{{ $data->done_id }}</span>
                </p>
                <p class="m-0 pt-5 text-bold w-100">Payment Id - <span class="gray-color">{{ $data->item_done_id }}</span>
                </p>
                <p class="m-0 pt-5 text-bold w-100">Order Date - <span class="gray-color">{{ $data->date_done }}</span>
                </p>
            </div>

            <div style="clear: both;"></div>
        </div>
        <div class="table-section bill-tbl w-100 mt-10">
            <table class="table w-100 mt-10">
                <tr>
                    <th class="w-50">From</th>

                </tr>
                <tr>
                    <td>
                        <div class="box-text">
                            <p>Gold Hallmarking Management System</p>
                            <p>Mumbai,</p>
                            <p>India</p>
                            <p>Contact: +91 9081250270</p>
                            <p>Center Id: AGR7214AVAT99</p>

                        </div>
                    </td>

                </tr>
            </table>
        </div>
        <div class="table-section bill-tbl w-100 mt-10">
            <table class="table w-100 mt-10">
                <tr>
                    <th class="w-50">Payment Method</th>
                    <th class="w-50">Payment Status</th>

                </tr>
                <tr>
                    <td>Debit Card</td>
                    <td>Done</td>

                </tr>
            </table>
        </div>
        <div class="table-section bill-tbl w-100 mt-10">
            <table class="table w-100 mt-10">
                <tr>
                    <th class="w-50">Details</th>
                    <th class="w-50">Price</th>
                    {{-- <th class="w-50">Price</th>
            <th class="w-50">Qty</th>
            <th class="w-50">Subtotal</th>
            <th class="w-50">Tax Amount</th>
            <th class="w-50">Grand Total</th> --}}
                </tr>
                <tr align="center">
                    <td>Item Id</td>
                    <td>{{ $data->item_done_id }}</td>
                    {{-- <td>$500.2</td>
            <td>3</td>
            <td>$1500</td>
            <td>$50</td>
            <td>$1550.20</td> --}}
                </tr>
                <tr align="center">
                    <td>Karat</td>
                    <td>{{ $data->karat }}</td>
                    {{-- <td>$250</td>
            <td>2</td>
            <td>$500</td>
            <td>$50</td>
            <td>$550.00</td> --}}
                </tr>
                <tr align="center">
                    <td>Gold</td>
                    <td>{{ $data->gold }}</td>
                    {{-- <td>$1000</td>
            <td>5</td>
            <td>$5000</td>
            <td>$500</td>
            <td>$5500.00</td> --}}
                </tr>
                <tr align="center">
                    <td>Other (silver,zink,platinum etc..)</td>
                    <td>{{ $data->other }}</td>
                    {{-- <td>$1000</td>
            <td>5</td>
            <td>$5000</td>
            <td>$500</td>
            <td>$5500.00</td> --}}
                </tr>
                <tr align="center">
                    <td>Charge Per Item</td>
                    <td>{{ $data->charges }}</td>
                    {{-- <td>$1000</td>
            <td>5</td>
            <td>$5000</td>
            <td>$500</td>
            <td>$5500.00</td> --}}
                </tr>
                <tr align="center">
                    <td>Gst + service Charge</td>
                    <td>{{ $data->tax }}%</td>
                    {{-- <td>$1000</td>
            <td>5</td>
            <td>$5000</td>
            <td>$500</td>
            <td>$5500.00</td> --}}
                </tr>
                <tr>
                    <td colspan="7">
                        <div class="total-part">
                            <div class="total-left w-85 float-left" align="right">
                                <p>Total Payable</p>
                            </div>
                            <div class="total-right w-15 float-left text-bold" align="right">
                                <p>{{ $data->total }} </p>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </td>
                </tr>
            </table>
    @endforeach
    <center>
        <h3>Thanks You..!!</h3>

    </center>

    </div>

</html>

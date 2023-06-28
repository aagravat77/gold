@extends('Layout.link')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta c harset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Gold Hallmarking Management System</title>
    <link rel="icon" type="image/gif/png" href="web_images/title_image.png">

    <style>
        .containerR {
            position: relative;
            max-width: 9000px;
            margin: 0 auto;
        }

        .containerR img {
            vertical-align: middle;
        }

        .containerR .content {
            position: absolute;
            bottom: 0;
            background: rgb(0, 0, 0);
            /* Fallback color */
            background: rgba(0, 0, 0, 0.5);
            /* Black background with 0.5 opacity */
            color: #f1f1f1;
            width: 100%;
            padding: 20px;
        }
    </style>

    <style>
        .containera {
            position: relative;
        }

        .image {
            display: block;
            width: 100%;
            height: auto;
        }

        .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #382c2c;
            overflow: hidden;
            width: 0;
            height: 100%;
            transition: .8s ease;
        }

        .containera:hover .overlay {
            width: 100%;
        }

        .text {
            color: rgb(255, 255, 255);
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        
    </style>



</head>
@section('main_section')

    <body>
       
        <div class="container">
            <center>
                @include('flash-message')
            </center>
        </div>


        <div class="containerR">
            <img src="https://images.pexels.com/photos/366551/pexels-photo-366551.jpeg?auto=compress&cs=tinysrgb&w=600"
                alt="Notebook" style="height:500px; width:100%;">
            <div class="content">
                <h1>Gold Hallmarking Management System</h1>
                <p>
                    We are Hall mark to Your Gold. And Any Gold Jewellary Like A Gold Biscuit, Chain, Payal, Mangalsutra,
                    Earings, Watch, Ring, Bracelet, Bangle, Medal, Anklet, Crown, etc.. many more ornaments of gold with
                    100% trusted place.
                </p>
            </div>
        </div>
        <hr>
        <div class="bg-light">
        <div class="container bg-light">
            <figure class="text-center">
                <blockquote class="blockquote ">
                    <p>Lets Understand That How Gold Hallmarking System Works..?</p>
                </blockquote>
            </figure>
        </div>
        </div>

        <hr>

        {{-- //other old code  --}}
        <div class="bg-warning py-5 about arr">
            <div class="container py-5">
                <div class="row align-items-center mb-5">
                    <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                        <h2 class="font-weight-light">Hallmarking overview</h2>
                        <p class="font-italic text-muted mb-4">Hallmarking is the accurate determination and official
                            recording of the proportionate content of precious metal in precious metal articles. Hallmarks
                            are thus official marks used in many countries as a guarantee of purity or fineness of precious
                            metal articles. The principle objectives of the Hallmarking Scheme are to protect the public
                            against adulteration and to obligate manufacturers to maintain legal standards of fineness. In
                            India, at present two precious metals namely gold and silver have been brought under the purview
                            of Hallmarking.</p>
                    </div>
                    <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img
                            src="https://img.etimg.com/photo/msid-91173600/bis-new-hallmark.jpg" alt=""
                            class="img-fluid mb-4 mb-lg-0"></div>
                </div>
                <br>

                <div class="row align-items-center">
                    <div class="col-lg-5 px-5 mx-auto"><img
                            src="https://assets.thehansindia.com/hansindia-bucket/bis_5986.jpg" alt=""
                            class="img-fluid mb-4 mb-lg-0"></div>
                    <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
                        <h2 class="font-weight-light">Bureau of Indian Standards</h2>
                        <p class="font-italic text-muted mb-4">
                            The Bureau of Indian Standards is the National Standards Body of India under Department of
                            Consumer affairs, Ministry of Consumer Affairs, Food & Public Distribution, Government of India.
                            It is established by the Bureau of Indian Standards Act, 2016 which came into effect on 12
                            October 2017.
                        </p>
                        <p class="font-italic text-muted mb-4">Any jeweller willing to obtain certificate of registration
                            for selling Hallmarked Gold and Silver Jewellery/artefacts shall apply online in the BIS portal;
                            www.manakonline.in . The certificate of registration is granted instantly to the jeweller
                            without the need to upload any document or pay any fees for the same. The certificate of
                            registration stands valid for lifetime..</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card text-center">
            <div class="card-header">
                Some Examples of Gold Items For Hallmarking
            </div>
            <div class="card-body bg-warning ">
                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 ">
                    <div class="col">
                        <div class="p-3 border bg-light">
                            <div class="containera">
                                <img src="https://w0.peakpx.com/wallpaper/926/191/HD-wallpaper-gold-bar-bar-gold.jpg"
                                    alt="" class="img-fluid image">
                                <div class="overlay">
                                    <div class="text">Gold Biscuits And Coins</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border bg-light">
                            <div class="containera">
                                <img src="https://images.meesho.com/images/products/28754016/xiiu5_512.webp"
                                    alt="" class="img-fluid image">
                                <div class="overlay">
                                    <div class="text">Women Jewellery</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border bg-light">
                            <div class="containera">
                                <img src="https://www.mugnierwatch.com/assets/images/Semper_Nemarosa_Ladies.png"
                                    alt="" class="img-fluid image" style="height: 28vw">
                                <div class="overlay">
                                    <div class="text">Watch and More Things</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border bg-light">
                            <div class="containera">
                                <img src="https://images.unsplash.com/photo-1651505965139-b89509056166?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDJ8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                                    alt="" class="img-fluid image" style="height: 28vw">
                                <div class="overlay">
                                    <div class="text">Men Jewellery</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border bg-light">
                            <div class="containera">
                                <img src="https://media.istockphoto.com/id/1139612546/es/foto/par-de-anillo-de-bodas-de-oro-rosa-y-oro-blanco-con-diamantes-sobre-fondo-de-m%C3%A1rmol-beige-con.jpg?s=612x612&w=0&k=20&c=sSfAiKFwR-V0MxOboiUPr70pIkj3UAXV_QiV57dVmcg=" style="height: 28vw"
                                    alt="" class="img-fluid image">
                                <div class="overlay">
                                    <div class="text">Rings</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <a href="register" class="btn btn-primary">Book Now</a>
            </div>
        </div>

    </body>

    </html>
@endsection

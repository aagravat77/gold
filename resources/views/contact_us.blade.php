@extends('Layout.link')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Gold Hallmarking Management System</title>
    <link rel="icon" type="image/gif/png" href="web_images/title_image.png">



</head>
@section('main_section')

    <body>
        <style>
            body {
                background-color: #FFC300;
            }
        </style>

         <div class="container">
            <center>
                @include('flash-message')
            </center>
        </div>

        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="https://managementdrives.com/wp-content/uploads/2022/03/contact-silhouette-654x436.png"
                            class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form  method="POST" action="{{ route('admin.contact') }}">
                        @csrf
                            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                <p class="lead fw-normal mb-0 me-3">Feel Free To Contact Us!!</p>
                               
                            </div>

                            <div class="divider d-flex align-items-center my-4">
                                <p class="text-center fw-bold mx-3 mb-0"></p>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="Name" id="form3Example3" class="form-control form-control-lg"
                                  name="name"  placeholder="Enter a valid Name" required/>
                                <label class="form-label" for="form3Example3">Your Name</label>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="form3Example3" class="form-control form-control-lg"
                                   name="email"  placeholder="Enter a valid email address" required/>
                                <label class="form-label" for="form3Example3">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <input type="text" id="form3Example4" class="form-control form-control-lg"
                                   name="msg"  placeholder="Enter Message" required/>
                                <label class="form-label" for="form3Example4">Message</label>
                            </div>

                           
                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                  {{ __('Send Message') }}
                                </button>
                                
                         

                        </form>
                    </div>
                </div>
            </div>
        </section>
        <style>
            .divider:after,
            .divider:before {
                content: "";
                flex: 1;
                height: 1px;
                background: #eee;
            }

            .h-custom {
                height: calc(100% - 73px);
            }

            @media (max-width: 450px) {
                .h-custom {
                    height: 100%;
                }
            }
        </style>


    </body>

    </html>
@endsection

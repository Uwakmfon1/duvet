<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Site Metas -->
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    {{-- <link rel="shortcut icon" href="images/favicon.png" type="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
    rel="stylesheet"> --}}
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <title>Sixteen Clothing HTML Template</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--
    TemplateMo 546 Sixteen Clothing
    https://templatemo.com/tm-546-sixteen-clothing
    -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}


    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-sixteen.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
    <title>Document</title>

    <style type="text/css">
        .center {
            margin: auto;
            width: 70%;
            text-align: center;
            padding: 30px;
        }

        .img_deg {
            height: 200px;
            width: 200px;
        }

        table, th, td {
            border: 1px solid grey;
        }

        .th_deg {
            font-size: 30px;
            padding: 5px;
            background-color: skyblue;
        }
        .total_deg{
            padding:40px;
            font-size: 20px;
        }
    </style>
</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    {{-- @include("home.header") --}}
    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.html">
                    <h2>Sixteen <em>Clothing</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/redirect">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Our Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/cart">Cart</a>
                        </li>
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <x-app-layout>

                                    </x-app-layout>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="{{ route('login') }}"
                                        style="margin-right:10px;">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-info" href="{{ route('register') }}">Sign Up</a>
                                </li>
                            @endauth
                        @endif

                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- end header section -->

    <div class="center">
        <table>
            <tr>
                <th class="th_deg">Product Title</th>
                <th class="th_deg">Quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Action</th>
            </tr>
            <?php $totalPrice = 0; ?>
            @foreach($cart as $cart)
                <tr>
                    <td>{{ $cart->product_title}}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td>₦{{ $cart->price }}</td>
                    <td><img class="img_deg" src="/product/{{$cart->image}}"></td>

                    <td>
       {{--confirmation(event)--}}
                        <a class="btn btn-danger" style="margin:10px;"  onclick="confirmation(ev)"
                           href="{{url('/remove_cart',$cart->id)}}">Remove Product</a>
                    </td>
                </tr>
                    <?php $totalPrice = $totalPrice + $cart->price; ?>
            @endforeach
        </table>
        <h2 class="total_deg">Total Price: ₦{{ $totalPrice }}

            <div style="padding-top: 20px;">
                <h1>Proceed To Order</h1>
                <a href="{{url('/cash_order')}}" class="btn btn-danger">Cash on Delivery</a>

                <a href="{{url('/stripe',$totalPrice)}}" class="btn btn-danger">Pay using Card</a>
            </div>
    </div>






    {{-- <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div> --}}

    <script>
        function confirmation(ev){
            ev.preventDefault();
            const urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                title:"Are you sure to cancel this product",
                text:"You will not be able to revert this!",
                icon: "warning",
                buttons:true,
                dangerMode:true,
            })
                .then((willCancel)=>{
                    if(willCancel){
                        window.location.href = urlToRedirect;
                    }
                })
        }

    </script>
    <!-- jQery -->
    <script src="home/fjs/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/fjs/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/fjs/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/fjs/custom.js"></script>
</body>
</html>

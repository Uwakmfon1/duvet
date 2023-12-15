<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <title>Sixteen Clothing HTML Template</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--
TemplateMo 546 Sixteen Clothing
https://templatemo.com/tm-546-sixteen-clothing
-->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-sixteen.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
    <title>Document</title>
</head>

<body>

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
                            <a class="nav-link" href="#">Home
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
                            <a class="nav-link" href="#">Cart</a>
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



    <br><br><br><br><br><br><br>



    <div class="product_card">
        <img src="../product/{{ $image }}" alt="" id="image" width="350" height="350">
        <div class="t_price">
            <h2>{{ $product->title }}</h2>
            <hr style="margin-bottom: 15px">
            @if ($product->discount_price !== null)
                <span style="display:flex;justify-content:space-evenly;">
                    <strike>
                        <h2 style="font-size:20px;">₦{{ $product->price }}</h2>
                    </strike>
                    <h2 style="font-size:20px;">₦{{ $product->discount_price }}</h2>
                </span>
            @else
                <h2>₦{{ $product->price }}</h2>
            @endif
            <hr style="margin-bottom:10px;">

            <div>
                <h2 id="add_quantity">Add Quantity</h2>

                <form action="{{url('add_cart',$product->id)}}" method="POST">
                    @csrf

                  <input type="text" name="image_src" value="{{ $product->image }}"  hidden>


                    <textarea name="product_title" value="{{ $product->title }}" id="" cols="30" rows="10" hidden>
                        {{ $product->title }}
                    </textarea>

                    <input type="number" min="1" value="1" name="quantity" id="">

                    <input type="submit" name="submit" value="Add To Cart"
                        style="background-color:#f33f3f;color:white;padding:0.6em;">

                </form>
            </div>
        </div>

    </div>


</body>

</html>

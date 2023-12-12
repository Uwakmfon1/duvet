<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
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
    <title>Document</title>
</head>
<body>
    <header class="header_section">
        <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="index.html"><h2>Sixteen <em>Clothing</em></h2></a>
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
                        <x-app-layout>

                        </x-app-layout>
                    </li>
              </ul>
            </div>
        </nav>
    </div>
      </header>


      <div class="product_card">
        <img src="../product/{{ $image }}" alt="" id="image" width="350" height="350">
        <div class="t_price" style="display:flex; gap:10px;">
            <h2 style="background:green;">{{ $product->title }}</h2>
        @if ($product->discount_price !== null)
        <h2>{{ $product->discount_price }}</h2>
        @else
        <h2>{{ $product->price }}</h2>
        @endif
        </div>
      </div>

</body>
</html>

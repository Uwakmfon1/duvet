@include('home.header')
<style>
    #container {
        position: relative;
        /* width: 500px !important;
      height: 400px !important; */

    }

    .overlay {
        position: absolute;
        top: 30%;
        left: 20%;
        transform: translate(-50%, -50%);
        width: 100px;
        height: 100px;
        display: none;
        text-align: center;
        line-height: 100px;
    }


    #submit_input {
        height: 35px;
        background: blue;
        color: white;
        margin-left: 100px;
        margin-top: 2em;
    }

    .add_cart{
       display:flex;
    }
</style>

<body>

    <!-- Header -->
    @include('home.navbar')

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text relative">
        <div class="owl-banner owl-carousel">
            <div class="banner-item-01">
                <div class="text-content">
                    <h4>Best Offer</h4>
                    <h2>New Arrivals On Sale</h2>
                </div>
            </div>
            <div class="banner-item-02">
                <div class="text-content">
                    <h4>Flash Deals</h4>
                    <h2>Get your best products</h2>
                </div>
            </div>
            <div class="banner-item-03">
                <div class="text-content">
                    <h4>Last Minute</h4>
                    <h2>Grab last minute deals</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Latest Products</h2>
                        {{-- <a href="products.html">view all products <i class="fa fa-angle-right"></i></a> --}}
                    </div>
                </div>
                @foreach ($product as $product)
                    {{-- <a href="{{ url('/show_particular_item', $product->id) }}" > --}}
                    <div class="col-md-4" id="container">
                        <div class="product-item">
                            <div class="overlay">
                                {{-- {{url('/add_cart',$product->id)}} --}}

                            </div>
                            <a href="{{ url('/show_particular_item', $product->id) }}"><img
                                    src="product/{{ $product->image }}" height="150" alt=""></a>
                            <div class="down-content">
                                <a href="#">
                                    <h4>{{ $product->title }}</h4>
                                </a>




                                @if ($product->discount_price !== null)
                                    <h6>₦{{ $product->discount_price }}</h6>
                                @else
                                    <h6>₦{{ $product->price }}</h6>
                                @endif
                                <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla
                                    aspernatur.</p>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                                <span>Reviews (24)</span>
                            </div>
                        </div>
                    </div>
                    {{-- </a> --}}
                @endforeach
            </div>
        </div>
    </div>

    <div class="best-features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>About Sixteen Clothing</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="left-content">
                        <h4>Looking for the best products?</h4>
                        <p><a rel="nofollow" href="https://templatemo.com/tm-546-sixteen-clothing"
                                target="_parent">Lorem, ipsum.
                            </a> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis voluptatibus
                            eius quas est mollitia numquam? <a rel="nofollow" href="#">Contact us</a> for more
                            info.</p>
                        <ul class="featured-list">
                            <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                            <li><a href="#">Consectetur an adipisicing elit</a></li>
                            <li><a href="#">It aquecorporis nulla aspernatur</a></li>
                            <li><a href="#">Corporis, omnis doloremque</a></li>
                            <li><a href="#">Non cum id reprehenderit</a></li>
                        </ul>
                        <a href="about.html" class="filled-button">Read More</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-image">
                        <img src="assets/images/feature-image.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite
                                    author nulla.</p>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="filled-button">Purchase Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('home.footer')

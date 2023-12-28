@include('home.header')
@include('home.navbar')
<br>
<br>
<br>
<br>
<div style="margin-left:30px;">
    <h2 style="font-size:30px; font-weight:700; margin-left:20px;">All Products</h2> <br>
    @foreach ($product as $product)
        {{-- <a href="{{ url('/show_particular_item', $product->id) }}" > --}}
        <div class="col-md-3" id="container">
            <div class="product-item">
                {{-- <div class="overlay">
                    {{url('/add_cart',$product->id)}}
                </div> --}}

                <a href="{{ url('/show_particular_item', $product->id) }}"><img src="product/{{ $product->image }}"
                        height="150" alt=""></a>
                <div class="down-content">
                    <a href="#">
                        <h4>{{ $product->title }}</h4>
                    </a>

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

@include('home.footer')

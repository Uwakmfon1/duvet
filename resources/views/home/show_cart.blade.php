@include('home.header')
@include('home.navbar')
@include('sweetalert::alert')

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

<div class="hero_area">

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

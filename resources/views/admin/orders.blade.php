<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.css")
    <style>
       .div_center{
           text-align: center;
       }
       .h2_font{
            font-size: 40px;
           padding-bottom: 40px;
       }
       form{
           color: black;
       }

       .center{
           margin: auto;
           width: 50%;
           text-align: center;
           border: 3px solid white;
           margin-top: 30px;
       }

    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include("admin.sidebar")
    <!-- partial -->
    @include("admin.header")
    <!-- page-body-wrapper ends -->
    <div class="main-panel">
        <div class="content-wrapper">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        x
                    </button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="div_center">
                <h2 class="h2_font">All Orders</h2>

                <form action="#" method="POST">
                    @csrf
                    <input type="text" class="input_color" placeholder="Search Orders" required name="category_name">
                    <input type="button" name="search" class="btn btn-primary" value="Search">
                </form>
            </div>
            <table class="center">
                <tr>
                    <td>Orders</td>
                    <td>Action</td>
                </tr>

                @foreach($order as $order)

                    <tr>
                        <td>{{ $order->name }}</td>

                    </tr>




                @endforeach
            </table>
        </div>
    </div>

<!-- container-scroller -->
@include("admin.script")
</body>
</html>


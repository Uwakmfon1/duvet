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
           width: 80%;
           text-align: center;
           border: 3px solid white;
           margin-top: 30px;
       }
        .tStyle{
            background-color:blue;
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
            @if($product->count() == 0)
                <h2 class="font_size">No products Yet</h2>
                <a href="{{ url('/view_product') }}" class="btn btn-success size" >
                    Add products
                </a>
            @else

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        x
                    </button>
                    {{ session()->get('message') }}
                </div>
            @endif

            <table class="center">
                <tr class="tStyle">
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Edit Product</th>
                    <th>Delete Product</th>
                </tr>

                @foreach($product as $product)

                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>
                            <img src="/product/{{ $product->image }}" alt="" width="150" height="100" >
                        </td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount_price }}</td>

                        <td>
                            <a  href="{{ url('/update_product',$product->id)}}"
                                class="btn btn-danger" >Edit</a>
                        </td>

                        <td>
                            <a onclick="confirm('Are You Sure To Delete This?')"
                               href="{{ url('/delete_product',$product->id) }}"
                               class="btn btn-danger" >Delete</a>
                        </td>


                    </tr>




                @endforeach
                @endif
            </table>
        </div>
    </div>

<!-- container-scroller -->
@include("admin.script")
</body>
</html>


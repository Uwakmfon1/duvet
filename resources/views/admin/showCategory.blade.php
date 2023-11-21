<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
        }


        .text_color {
            color: black;
            padding-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
        }

        .submit {
            background: transparent;
            border: 1px solid white;
            color: white;
            padding: 5px;
        }

    </style>
    @include("admin.css")
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include("admin.sidebar")
    <!-- partial -->
    @include("admin.header")
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
                <h2 class="font_size">Add Category</h2>

                <div class="add_category">

                    <form action="{{ url('/add_category') }}" method="POST">
                        <input type="text" name="category" style="color: black;">
                        <input type="submit" value='Add Category' style="border:2px solid rgb(140, 140, 175);border-radius:6px; padding:6px;">
                    </form>

                </div>

                <table>
                    {{-- @foreach($category as $category)

                    @endforeach --}}
                </table>
            </div>
        </div>
    </div>
    <!-- page-body-wrapper ends -->


    <!-- container-scroller -->
@include("admin.script")
</body>
</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    body{
        background:rgb(241, 237, 237);
    }

    .show{
        display: flex;
        gap: 100px;
        width: 60vw;
        height: 60vh;
        background:#fff;
        border-radius:10px;
        margin-top:10% !important;
        margin-left:20%;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
        padding:3em;
    }


    .show > .secondClass > button{
        background-color: red !important;
        position: relative;
        
    }

    .show image{
        width: 45% !important;
        height:60vh;
    }

    button{
        width:250px;
        height:50px;
        border-radius: 5px;
        border: none;
    }

</style>
<body>
    {{-- <?php echo  ?> --}}

    <div class="show">
        <div>
            <img src="../product/{{ $image }}" alt=""></a>
        </div>

        <div class="secondClass">
            <h3>{{ $product->price }}</h3>
            <button style="background-color: orange;">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18"
                    viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                    <path
                        d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                </svg>
                Add To Cart
            </button>
        </div>
    </div>
</body>

</html>

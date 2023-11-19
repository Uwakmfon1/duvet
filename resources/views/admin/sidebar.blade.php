<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    *{
        list-style: none;
        text-decoration: none;

    }
    .sidebar{
        background-color:rgb(61, 61, 61);
        width: 13%;
        height: 100vh;
        padding:1em;
    }

    #navigations{
        color: gray;
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-size: 17px;

    }
    .sidebar{
        position:fixed;
    }

</style>

<body>
    <div class="sidebar">
        <div class="profile"></div>
        <div class="navigations">
            <h2 id="navigations">Navigations</h2>
            <ul>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><a href="#">Product</a></li>
                <li><a href="#">Category</a></li>
                <li><a href="#">Orders</a></li>
            </ul>
        </div>

    </div>

</body>
</html>

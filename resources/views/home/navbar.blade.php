<header class="header_section">
    <div class="container">

<nav class="p-5 text-white font-bold shadow md:flex md:items-center md:justify-between">
    <div class="flex justify-between items-center">
        <span >
            <h2 class="text-2xl font-[Poppins] cursor-pointer ">Sixteen Clothing</h2>
        </span>

        <span class="text-3xl cursor-pointer mx-2 md:hidden block">
            <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
        </span>
    </div>

    <ul class="bg-white lg:bg-transparent lg:text-white md:flex md:items-center z-[-1] text-black
            md:z-auto md:static absolute  w-full
            left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 opacity-0 md:opacity-100
            top-[-400px] transition-all ease-in duration-500  ">

        <li class="mx-4 my-6 md:my-0">
            <a href="#" class="text-xl hover:text-red-600 duration-500">Home</a>
        </li>
        <li class="mx-4 my-6 md:my-0">
            <a href="#" class="text-xl hover:text-red-600 duration-500">About</a>
        </li>
        <li class="mx-4 my-6 md:my-0">
            <a href="#" class="text-xl hover:text-red-600 duration-500">Contact</a>
        </li>
        <li class="mx-4 my-6 md:my-0">
            <a href="#" class="text-xl hover:text-red-600 duration-500">Cart</a>
        </li>
        <form class="form-inline">
            @csrf
            <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>

        <button class="bg-red font-[Poppins] duration-500 px-6 py-2 mx-4 hover:bg-red-600">
            John Doe
        </button>
    </ul>
</nav>


</div>
</header>
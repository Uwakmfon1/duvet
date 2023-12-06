<header class="header_section">
    <div class="container">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="index.html"><h2>Sixteen <em>Clothing</em></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#" {{-- index.html --}}>Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" {{-- products.html --}}>Our Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" {{-- about.html --}}>About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" {{-- contact.html --}}>Contact Us</a>
            </li>
            @if (Route::has('login'))
            @auth
                <li class="nav-item">
                    <x-app-layout>

                    </x-app-layout>
                </li>
            @else
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{ route('login') }}" style="margin-right:10px;">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-info" href="{{ route('register') }}">Sign Up</a>
                </li>
            @endauth
          @endif

          </ul>



        </div>
    </nav>
</div>
  </header>


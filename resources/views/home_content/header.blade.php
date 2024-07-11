<header class="header_section">
  <nav class="navbar navbar-expand-lg custom_nav-container ">
    <a class="navbar-brand" href="index.html">
      <span>
        Giftos
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class=""></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  ">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.html">
            Shop
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="why.html">
            Why Us
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="testimonial.html">
            Testimonial
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact Us</a>
        </li>
        <li class="nav-item">
         <a href="{{url('mycart')}}">
         <i class="fa fa-shopping-bag" aria-hidden="true"></i>
         </a>
          [{{$count}}]
        </li>
      </ul>
      <div class="user_option">
        @if (Route::has('login'))
        <nav class="-mx-3 flex flex-1 justify-end">
          @auth
          <form method="POST" action="{{ route('logout') }}">
                            @csrf

                           <input class="btn btn-success" type="submit" value="logout">
                        </form>
          @else
          <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            Log in
          </a>

          @if (Route::has('register'))
          <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            Register
          </a>
          @endif
          @endauth
        </nav>
        @endif
      </div>
    </div>
  </nav>
</header>
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>SEKERTARIS</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{ route('home') }}">Home</a></li>
          @if (Auth::check())
          <li><a class="get-a-quote" href="{{ url('dashboard') }}" style="background: none;border: 1px solid blue;border-radius: 15px;">Profile</a></li>
          <li><a class="get-a-quote bg-danger" href="{{ url('/logout')}}" style="background: none!important;border: 1px solid red;border-radius: 15px;">Logout</a></li>
          @else
          <li><a class="get-a-quote" href="{{ url('login') }}" style="background: none;border: 1px solid blue;border-radius: 15px;">Login</a></li>
          @endif
        </ul>
      </nav><!-- .navbar -->

    </div>
</header>
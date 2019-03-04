
<!-- banner -->
<div class="ban-top menu-bheim " style="position:fixed !important;">
  <!-- header -->
  <div class="header nuluhur" id="home">
      <div class="container">
          <ul class="pull-right">
              <li class='hidden-xs'> <a href="{{ route('track-order') }}"> Track order </a></li>
              @if (Auth::guest())
                <li> <a href='{{ route('login') }}'> Sign in </a></li>
                <li class='hidden-xs'> <a href='{{ route('register') }}'> Sign up </a></li>
              @endif
              <li class='hidden-xs'>		
                  <a href="{{URL::to('cart')}}"><strong>{{ Cart::count() }}</strong> Items in Cart</a>
              </li>
              @if (Auth::user())
                <li class="dropdown"> 
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="fa fa-user-circle"></i>{{ Auth::user()->user_name }}</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li>
                        <a href="#">
                          <span>Halo,</span> <br>
                          {{ Auth::user()->user_name }}
                          <div class="li-avatar">
                              <img src="{{ asset(Auth::user()->customers_picture) }}" width="32px" height="32px" alt="avatar" class="img-circle">
                          </div>
                        </a>
                      </li>
                      <li role="separator" class="divider"></li>
                      <li><a href="{{ route('user.order') }}">History Pembelian</a></li>
                      <li><a href="{{ route('user.account') }}">Pengaturan</a></li>
                      <li><a href="{{ route('user.change-password') }}">Ubah Password</a></li>
                      <li> 
                          <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                      </li>
                    </ul>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              @endif
          </ul>
      </div>
  </div>
  
  <div class="headerheim muntjul" style="background-color:#f58634 !important;">
      <div class="container">
          <ul>
              <li><a href="index.html">Home</a></li>
              <li><a href="blankenheim-products.html">Products</a></li>
              <li><a href="about-blankenheim.html">About</a></li>
              <li><a href="http://bit.ly/halloblankenheim1"><i class="fa fa-whatsapp" aria-hidden="true"></i> Chat on Whatsapp</a></li>
          </ul>
      </div>
  </div>
  
  
  <!-- //header -->
      <div class="container menubawah">
          <div class="top_nav_left">
            <a href="{{ route('home') }}"><img src="{{ asset('resources/views/frontend/images/logo/endless.png') }}" class="img-responsive"/></a>
          </div>
          <div class="top_nav_right">
              <nav class="navbar navbar-default">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                  </div>
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav menu__list">
                      <li class="menu__item"><a class="menu__link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a></li>
                      <li class="menu__item"><a class="menu__link" href="{{ route('product') }}">Endless Products</a></li>
                      <li class="menu__item"><a class="menu__link" href="{{ route('about') }}">About</a></li>
                      <li class="menu__item"><a class="menu__link" href="{{ route('gallery') }}">Gallery</a></li>
                      <li class="menu__item"><a class="menu__link" href="{{ route('faq') }}">FAQ</a></li>
                      <li class="menu__item"><a class="menu__link" href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                  </div>
                </div>
              </nav>		
          </div>
          <div class="clearfix"></div>
      </div>
  </div>
  <!-- //banner-top -->

<!-- banner -->
<div class="ban-top menu-bheim " style="position:fixed !important;">
  <!-- header -->
  <div class="header nuluhur" id="home">
      <div class="container">
          <ul class="pull-right">
              <li class='hidden-xs'> <a href="{{ route('track-order') }}"> Track Order </a></li>
              @if (Auth::guest())
                <li> <a href='{{ route('login') }}'> Login </a></li>
                <li class='hidden-xs'> <a href='{{ route('register') }}'> Daftar </a></li>
              @endif
              <li>		
                  <a href="{{URL::to('cart')}}"><strong>{{ Cart::instance('default')->count() }}</strong> dalam keranjang</a>
              </li>
              @if (Auth::user())
                <li class="dropdown"> 
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                      <i class="fa fa-user-circle"></i>
                      @if(!empty(Auth::user()->user_name))
                        {{ Auth::user()->user_name }}    
                      @else
                        {{ Auth::user()->customers_firstname }}
                      @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li>
                        <a href="{{ route('user.account') }}">
                          <span>Halo,</span> <br>
                          @if(!empty(Auth::user()->user_name))
                            {{ Auth::user()->user_name }}    
                          @else
                            {{ Auth::user()->customers_firstname }}
                          @endif
                          <div class="li-avatar">
                            @if(Auth::user()->customers_picture != '')
                              <img src="{{ asset(Auth::user()->customers_picture) }}" width="32px" height="32px" alt="avatar" class="img-circle">
                            @else
                              <div class="fa fa-2x fa-user-circle"></div>
                            @endif
                          </div>
                        </a>
                      </li>
                      <li role="separator" class="divider"></li>
                      <li><a href="{{ route('user.order') }}">Histori Pembelian</a></li>
                      <li><a href="{{ route('user.wishlist') }}">Wishlist</a></li>
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
  
  <!-- <div class="headerheim muntjul" style="background-color:#f58634 !important;">
      <div class="container">
          <ul>
              <li><a href="index.html">Home</a></li>
              <li><a href="blankenheim-products.html">Produk</a></li>
              <li><a href="about-blankenheim.html">Tentang Kami</a></li>
              <li><a href="http://bit.ly/halloblankenheim1"><i class="fa fa-whatsapp" aria-hidden="true"></i> Chat di Whatsapp</a></li>
          </ul>
      </div>
  </div> -->
  
  
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
                      <li class="menu__item"><a class="menu__link" href="{{ route('product') }}">Endless Produk</a></li>
                      <li class="menu__item"><a class="menu__link" href="{{ route('about') }}">Tentang Kami</a></li>
                      <li class="menu__item"><a class="menu__link" href="{{ route('gallery') }}">Galeri</a></li>
                      <li class="menu__item"><a class="menu__link" href="{{ route('faq') }}">FAQ</a></li>
                      <li class="menu__item"><a class="menu__link" href="{{ route('contact') }}">Kontak</a></li>
                    </ul>
                  </div>
                </div>
              </nav>		
          </div>
          <div class="clearfix"></div>
      </div>
  </div>
  <!-- //banner-top -->
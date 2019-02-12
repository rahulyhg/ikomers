
<!-- banner -->
<div class="ban-top menu-bheim " style="position:fixed !important;">
        <!-- header -->
        <div class="header nuluhur" id="home">
            <div class="container">
                <ul class="pull-right">
                    <li class='hidden-xs'> <a href="#"> Track order </a></li>
                    @if (Auth::guest())
                      <li> <a href='login'> Sign in </a></li>
                      <li class='hidden-xs'> <a href='register'> Sign up </a></li>
                    @endif
                    <li class='hidden-xs'>		
                        <a href="{{URL::to('cart')}}"><strong>{{ Cart::count() }}</strong> Items in Cart</a>
                    </li>
                    @if (Auth::user())
                      <li> 
                          <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            Logout
                        </a>
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
                    <a href="index.html"><img src="{!! asset('resources/views/frontend/images/logo/endless.png') !!}" class="img-responsive"/></a>
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
                            <li class="active menu__item menu__item--current"><a class="menu__link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a></li>
                            <li class=" menu__item"><a class="menu__link" href="{{ route('product') }}">Endless Products</a></li>
                            <li class=" menu__item"><a class="menu__link" href="about-blankenheim.html">About</a></li>
                            <li class=" menu__item"><a class="menu__link" href="gallery.html">Gallery</a></li>
                            <li class=" menu__item"><a class="menu__link" href="http://blog.blankenheim.id">FAQ</a></li>
                            <li class=" menu__item"><a class="menu__link" href="contact-blankenheim.html">Contact</a></li>
                          </ul>
                        </div>
                      </div>
                    </nav>		
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //banner-top -->
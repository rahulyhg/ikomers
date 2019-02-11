
<!-- banner -->
<div class="ban-top menu-bheim " style="position:fixed !important;">
<!-- header -->
<div class="header nuluhur" id="home">
	<div class="container">
		<ul>
			<li><a href="http://bit.ly/halloblankenheim1"><i class="fa fa-whatsapp" aria-hidden="true"></i> Chat on whatsapp</a></li>
		    <li class='hidden-xs'> <a href="#"><i class="fa fa-motorcycle" aria-hidden="true"></i> Track order </a></li>
                        <?php
                        $get_custname = "select * from customers WHERE customer_email = '$_SESSION[customer_email]' ";
                        $run_custname = mysqli_query($con,$get_custname);

                        $row_custname = mysqli_fetch_array($run_custname);                            
                        $cust_name = $row_custname['customer_name'];
                            
                        if(!isset($_SESSION['customer_email'])){
                        echo "
						<li> <a href='login.html'><i class='fa fa-unlock-alt' aria-hidden='true'></i> Sign in </a></li>
						<li class='hidden-xs'> <a href='registration.html'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Sign up </a></li>
						";
                        }else{
                        echo "
						<li><a href='#'>Halo " . $cust_name . "</a></li>
						<li ><a class='color-white'  href='logout.html'> Logout </a></li>
						";
                        }

                        ?> 
			
			<li style="width:15% !important;" class='hidden-xs'>		

					<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i><span> <a href="your-cart.html"><?php items(); ?> items in cart </span></a></button>
			
			</li>
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
			<a href="index.html"><img src="images/logo/logo-blankenheim-ori.png" class="img-responsive"/></a>
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
					<li class="active menu__item menu__item--current"><a class="menu__link" href="index.html">Home <span class="sr-only">(current)</span></a></li>
					<li class=" menu__item"><a class="menu__link" href="blankenheim-products.html">Blankenheim Products</a></li>
					<li class=" menu__item"><a class="menu__link" href="about-blankenheim.html">About</a></li>
					<li class=" menu__item"><a class="menu__link" href="gallery.html">Gallery</a></li>
					<li class=" menu__item"><a class="menu__link" href="http://blog.blankenheim.id">Blog</a></li>
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

<!-- banner -->
<div class="ban-top ">
<!-- header -->
<div class="header" id="home">
	<div class="container">
		<ul>
			<li><i class="fa fa-phone" aria-hidden="true"></i> Call : 01234567898</li>
		    <li> <a href="#"><i class="fa fa-motorcycle" aria-hidden="true"></i> Track Order </a></li>
                        <?php
                        $get_custname = "select * from customers WHERE customer_email = '$_SESSION[customer_email]' ";
                        $run_custname = mysqli_query($con,$get_custname);

                        $row_custname = mysqli_fetch_array($run_custname);                            
                        $cust_name = $row_custname['customer_name'];
                            
                        if(!isset($_SESSION['customer_email'])){
                        echo "
						<li> <a href='#' data-toggle='modal' data-target='#myModal'><i class='fa fa-unlock-alt' aria-hidden='true'></i> Sign In </a></li>
						<li> <a href='#' data-toggle='modal' data-target='#myModal2'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Sign Up </a></li>
						";
                        }else{
                        echo "
						<li><a href='#'>Halo " . $cust_name . "</a></li>
						<li><a class='color-white'  href='logout.html'> Logout </a></li>
						";
                        }

                        ?> 
			
			<li style="width:15% !important;">		
				<form action="#" method="post" class="last"> 
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="display" value="1">
					<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i><span> <a><?php items(); ?> items in cart </span></a></button>
				</form>  			
			</li>
		</ul>
	</div>
</div>
<!-- //header -->
	<div class="container straightline-bheim">
		<div class="top_nav_left">
			<a href="index.php"><img src="images/logo/logo-blankenheim-ori.png" class="img-responsive"/></a>
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
					<li class=" menu__item"><a class="menu__link" href="">Footwear</a></li>
					<li class=" menu__item"><a class="menu__link" href="">Accessories</a></li>
					<li class=" menu__item"><a class="menu__link" href="about-blankenheim.html">About</a></li>
					<li class=" menu__item"><a class="menu__link" href="">Blog</a></li>
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
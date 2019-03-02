<!-- /banner_bottom_agile_info -->
<?php
	if(!isset($_SESSION['customer_email'])){
echo'
<div class="page-head_agile_info_w3l">
		<div class="container dottedline-bheim">
			<h3>L<span>ogin</span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Login</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>
   <!--/contact-->
   <div class="banner_bottom_agile_info">
	<div class="container">
					<div class=" col-md-12 contact-formnewbheim">';?>
					
					<?php
					include("customer/customer_loginin.php");
					
					?>
	<?php
	echo '
					</div>
	</div>
	</div>
 <!--//contact-->';
 
					}
	else{
			echo "<script>window.open('blankenheim-products.html','_self')</script>";
	}
 
 ?>





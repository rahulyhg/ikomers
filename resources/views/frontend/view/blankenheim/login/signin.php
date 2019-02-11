<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
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
					<div class="col-md-offset-3 col-md-6 contact-formnewbheim">
						<form  method="post" ><!--form Starts -->

						<div class="form-group" ><!-- form-group Starts -->

						<label>Email</label>

						<input type="text" class="form-control formbheim" name="c_email" required >

						</div><!-- form-group Ends -->

						<div class="form-group" ><!-- form-group Starts -->

						<label>Password</label>

						<input type="password" class="form-control formbheim" name="c_pass" required >

						<h4 class="signbheim" align="center">

						<a href="forgot_pass.php"> Forgot Password ? </a>

						</h4>

						</div><!-- form-group Ends -->

						<div class="text-center" ><!-- text-center Starts -->

												<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
												<button class="newbutton" type="submit" name="login">

												<i class="fa fa-unlock" ></i> Login</button>
												</div>
						</div><!-- text-center Ends -->


						</form><!--form Ends -->					
					</div>
	</div>
	</div>
 <!--//contact-->
 
 <?php

if(isset($_POST['login'])){

$customer_email = $_POST['c_email'];

$customer_pass = $_POST['c_pass'];

$select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

$run_customer = mysqli_query($con,$select_customer);

$get_ip = getRealUserIp();

$check_customer = mysqli_num_rows($run_customer);

$select_cart = "select * from cart where ip_add='$get_ip'";

$run_cart = mysqli_query($con,$select_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_customer==0){

echo "<script>alert('password or email is wrong')</script>";

echo "<script>window.open('http://blankenheim.id/sign-in.html','_self')</script>";


}

if($check_customer==1 AND $check_cart==0){

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

}
else {

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('choose-payment.html','_self')</script>";

} 


}

?>


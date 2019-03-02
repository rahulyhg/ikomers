<div class="page-head_agile_info_w3l">
		<div class="container dottedline-bheim">
			<h3>R<span>egister </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Register</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>

<div class="banner_bottom_agile_info">
	<div class="container">
		<form action="register.html" method="post" enctype="multipart/form-data" ><!-- form Starts -->

		<div class="form-group" ><!-- form-group Starts -->

		<label>Customer Name</label>

		<input type="text" class="form-control" name="c_name" required>

		</div><!-- form-group Ends -->

		<div class="form-group"><!-- form-group Starts -->

		<label> Customer Email</label>

		<input type="text" class="form-control" name="c_email" required>

		</div><!-- form-group Ends -->

		<div class="form-group"><!-- form-group Starts -->

		<label> Customer Password </label>

		<div class="input-group"><!-- input-group Starts -->

		<span class="input-group-addon"><!-- input-group-addon Starts -->

		<i class="fa fa-check tick1"> </i>

		<i class="fa fa-times cross1"> </i>

		</span><!-- input-group-addon Ends -->

		<input type="password" class="form-control" id="pass" name="c_pass" required>

		<span class="input-group-addon"><!-- input-group-addon Starts -->

		<div id="meter_wrapper"><!-- meter_wrapper Starts -->

		<span id="pass_type"> </span>

		<div id="meter"> </div>

		</div><!-- meter_wrapper Ends -->

		</span><!-- input-group-addon Ends -->

		</div><!-- input-group Ends -->

		</div><!-- form-group Ends -->


		<div class="form-group"><!-- form-group Starts -->

		<label> Confirm Password </label>

		<div class="input-group"><!-- input-group Starts -->

		<span class="input-group-addon"><!-- input-group-addon Starts -->

		<i class="fa fa-check tick2"> </i>

		<i class="fa fa-times cross2"> </i>

		</span><!-- input-group-addon Ends -->

		<input type="password" class="form-control confirm" id="con_pass" required>

		</div><!-- input-group Ends -->

		</div><!-- form-group Ends -->

		<div class="form-group"><!-- form-group Starts -->

		<center>

		<label> Captcha Verification </label>

		<div class="g-recaptcha" data-sitekey="6LcjmkwUAAAAAOLW18NwbM220dj9mqpHVqY_qfJu"></div>

		</center>

		</div><!-- form-group Ends -->


		<div class="text-center"><!-- text-center Starts -->

		<button type="submit" name="register" class="btn btn-lg ulockd-btn-styledark hvr-bounce-to-right">

		<i class="fa fa-user-md"></i> Register

		</button>

		</div><!-- text-center Ends -->

		</form><!-- form Ends -->
	</div>
</div> 


<?php

if(isset($_POST['register'])){

$secret = "6LcjmkwUAAAAAJbdhE1vH1qSwfCqxc5bq0oExG3p";

$response = $_POST['g-recaptcha-response'];

$remoteip = $_SERVER['REMOTE_ADDR'];

$url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");

$result = json_decode($url, TRUE);

if($result['success'] == 1){

$c_name = $_POST['c_name'];

$c_email = $_POST['c_email'];

$c_pass = $_POST['c_pass'];

$c_ip = getRealUserIp(); 

$get_email = "select * from customers where customer_email='$c_email'";

$run_email = mysqli_query($con,$get_email);

$check_email = mysqli_num_rows($run_email);

if($check_email == 1){

echo "<script>alert('This email is already registered, try another one')</script>";

exit();

}

$customer_confirm_code = mt_rand();

$subject = "Email Confirmation Message";

$from = "luckypangestu@gmail.com";

$message = "

<h2>
Confirmation Registration in Blankenheim.id $c_name
</h2>

<a href='http://dev.blankenheim.id/customer/my_account.php?$customer_confirm_code'>

Click Here to Confirm Your Account

</a>

";

$headers = "From: $from \r\n";

$headers .= "Content-type: text/html\r\n";

mail($c_email,$subject,$message,$headers);

$insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_ip,customer_confirm_code) values ('$c_name','$c_email','$c_pass','$c_ip','$customer_confirm_code')";


$run_customer = mysqli_query($con,$insert_customer);

$sel_cart = "select * from cart where ip_add='$c_ip'";

$run_cart = mysqli_query($con,$sel_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_cart>0){

$_SESSION['customer_email']=$c_email;

echo "<script>alert('You have been Registered Successfully')</script>";

echo "<script>window.open('your-cart.html','_self')</script>";

}else{

$_SESSION['customer_email']=$c_email;

echo "<script>alert('You have been Registered Successfully')</script>";

echo "<script>window.open('https://dev.blankenheim.id/customer/my_account.php?edit_account','_self')</script>";


}


}
else{

echo "<script>alert('Please Select Captcha, Try Again')</script>";

}


}

?>
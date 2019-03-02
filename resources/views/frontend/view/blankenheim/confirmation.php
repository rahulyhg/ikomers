<div class="page-head_agile_info_w3l">
		<div class="container dottedline-bheim">
			<h3>Payment <span>Confirmation </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Payment Confirmation</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>
<!-- /banner_bottom_agile_info -->
    <div class="banner_bottom_agile_info">
	    <div class="container">
			<div class="agile_ab_w3ls_info">
				 <div class="col-md-offset-2  col-md-8 col-xs-12 col-sm-12  ab_pic_w3ls_text_info">
						<h1 align="center"> Please Confirm Your Payment </h1>
						<br />


						<form action="payment-confirmation.html?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data"><!--- form Starts -->

						<div class="form-group"><!-- form-group Starts -->

						<label>Invoice No:</label>

						<input type="text" class="form-control" name="invoice_no" required>

						</div><!-- form-group Ends -->


						<div class="form-group"><!-- form-group Starts -->

						<label>Amount Sent:</label>

						<input type="text" class="form-control" name="amount_sent" required>

						</div><!-- form-group Ends -->

						<div class="form-group"><!-- form-group Starts -->

						<label>Select Payment Mode:</label>

						<select name="payment_mode" class="form-control"><!-- select Starts -->

						<option>Select Payment Mode</option>
						<option>Bank Mandiri - a.n. Blankenheim</option>
						<option>Bank BNI - a.n. Blankenheim</option>
						<option>Bank BRI - a.n. Blankenheim</option>

						</select><!-- select Ends -->

						</div><!-- form-group Ends -->

						<div class="form-group"><!-- form-group Starts -->

						<label>Sender Bank:</label>

						<input type="text" class="form-control" name="ref_no" required>

						</div><!-- form-group Ends -->


						<div class="form-group"><!-- form-group Starts -->

						<label>Sender Name:</label>

						<input type="text" class="form-control" name="code" required>

						</div><!-- form-group Ends -->


						<div class="form-group"><!-- form-group Starts -->

						<label>Payment Date:</label>

						<input type="text" class="form-control" name="date" required>

						</div><!-- form-group Ends -->

						<div class="text-center"><!-- text-center Starts -->

						<button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">

						<i class="fa fa-user-md"></i> Confirm Payment

						</button>

						</div><!-- text-center Ends -->

						</form><!--- form Ends -->

						<?php

						if(isset($_POST['confirm_payment'])){

						$update_id = $_GET['update_id'];

						$invoice_no = $_POST['invoice_no'];

						$amount = $_POST['amount_sent'];

						$payment_mode = $_POST['payment_mode'];

						$ref_no = $_POST['ref_no'];

						$code = $_POST['code'];

						$payment_date = $_POST['date'];

						$complete = "Complete";

						$insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";

						$run_payment = mysqli_query($con,$insert_payment);

						$update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";

						$run_customer_order = mysqli_query($con,$update_customer_order);

						$update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";

						$run_pending_order = mysqli_query($con,$update_pending_order);

						if($run_pending_order){

						echo "<script>alert('your Payment has been received,order will be completed within 24 hours')</script>";

						echo "<script>window.open('index.html','_self')</script>";

						}



						}



						?>

				</div>
				  <div class="clearfix"></div>
			</div>    

		 </div> 
    </div>
	<!-- team -->

  <!-- banner-bootom-w3-agileits -->

<div class="col-md-3"><!-- col-md-3 Starts -->

<div class="box" id="order-summary"><!-- box Starts -->
    

<div class="row">
<?php
	if($_SESSION['pro_qty']==NULL || $_SESSION['pro_qty']=='0'){
		echo "<script>alert('Product Quantity Should be Inserted, Minimum 1 Quantity ')</script>";
	} 
	else{
		echo"
			<div class='col-md-12 col-xs-12 col-sm-12'>
			<a href='checkout.html' class='btn btn-primary bayarheim'>

			Proceed to checkout <i class='fa fa-chevron-right'></i>

			</a>
			</div>
		";
	}
?>
</div><!-- end row --> 

    
<div class="box-header"><!-- box-header Starts -->

<h3>Order Summary</h3>

</div><!-- box-header Ends -->

<p class="text-muted">
Shipping and additional costs are calculated based on the values you have entered.
</p>

<div class="row summaryheim">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="row summaryspace">
			<div class="col-md-6 col-sm-6 col-xs-6">
				<h5>Order Subtotal</h5>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<h5>IDR <?php echo number_format($total,0, ",", "."); ?></h5>
			</div>			
		</div>
		<div class="row summaryspace">
			<div class="col-md-6 col-sm-6 col-xs-6">
				<h5>Shipping Cost</h5>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<h5 id="shippingCost">IDR 0.00</h5>
			</div>			
		</div>	
		<div class="row summaryspace">
			<div class="col-md-6 col-sm-6 col-xs-6">
				<h5>Tax</h5>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<h5>IDR 0.00</h5>
			</div>			
		</div>	
		<div class="row summaryspace">
			<div class="col-md-6 col-sm-6 col-xs-6">
				<h6>Total</h6>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<h6 id="totalSummary" data-total="<?php echo $total ?>">IDR <?php echo number_format($total,0, ",", "."); ?></h6>
			</div>			
		</div>			
	</div>
</div>

<!--end row proceed to checkout-->
<div class="row">
<?php
	if($_SESSION['pro_qty']==NULL || $_SESSION['pro_qty']=='0'){
		echo "<script>alert('Product Quantity Should be Inserted, Minimum 1 Quantity ')</script>";
	} 
	else{
		echo"
			<div class='col-md-12 col-xs-12 col-sm-12'>
			<a href='checkout.html' class='btn btn-primary bayarheim'>

			Proceed to checkout <i class='fa fa-chevron-right'></i>

			</a>
			</div>
		";
	}
?>
</div><!-- end row --> 
    
</div><!-- box Ends -->

</div><!-- col-md-3 Ends -->
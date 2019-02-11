<div class="col-md-3"><!-- col-md-3 Starts -->

<div class="box" id="order-summary"><!-- box Starts -->

    
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
				<h5 id="shippingCost" data-total="<?php echo $tarifnya ?>">IDR <?php echo number_format($tarifnya,0, ",", "."); ?></h5>
				<input type="hidden" id="shippingCosthide"/>
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


    
</div><!-- box Ends -->

</div><!-- col-md-3 Ends -->
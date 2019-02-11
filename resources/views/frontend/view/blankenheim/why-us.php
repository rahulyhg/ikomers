
<!--/grids-->
<div class="coupons">
		<div class="coupons-grids text-center">
			<div class="w3layouts_mail_grid">
				<?php

				$get_services = "select * from services ORDER by service_id DESC";

				$run_services = mysqli_query($con,$get_services);

				while($row_services = mysqli_fetch_array($run_services)){

				$service_id = $row_services['service_id'];

				$service_title = $row_services['service_title'];

				$service_image = $row_services['service_image'];

				$service_desc = $row_services['service_desc'];

				$service_button = $row_services['service_button'];

				$service_url = $row_services['service_url'];
				?>			
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa <?php echo $service_button ?>" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3><?php echo $service_title ?></h3>
						<p><?php echo $service_desc ?></p>
					</div>
				</div>
<?php
				}
?>
				<div class="clearfix"> </div>
			</div>

		</div>
</div>
<!--grids-->
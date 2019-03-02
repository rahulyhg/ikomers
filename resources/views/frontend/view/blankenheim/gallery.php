<div class="page-head_agile_info_w3l">
		<div class="container dottedline-bheim">
			<h3>Our <span>Gallery </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Gallery</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>
<!-- /banner_bottom_agile_info -->
    <div class="banner_bottom_agile_info">
	    <div class="container">

	<div class="gal">
							<?php
                            $get_gall = "select * from gal_section";

                            $run_gall = mysqli_query($con,$get_gall);

                            while($row_gall=mysqli_fetch_array($run_gall)){

                            $gall_desc = $row_gall['gal_desc'];
                            $gall_url = $row_gall['gal_url'];
                            $gall_image = $row_gall['gal_image'];
							$gall_fronttext = substr($row_gall['gal_title'],0,1);							
							$gall_name = substr($row_gall['gal_title'],1,10);							

                            echo "
								<img src='admin_area/gallery_images/med_$gall_image' alt='$gall_name'>

                            ";
                            }

                            ?>	
	

				
	</div>
	




		 </div> 
    </div>
	<!-- team -->


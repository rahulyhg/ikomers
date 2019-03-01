<?php
$get_howto = "select * from howto";

$run_howto = mysqli_query($con,$get_howto);

$row_howto = mysqli_fetch_array($run_howto);

$how_title = $row_how['how_title'];
$how_desc = $row_how['how_desc'];
$how_image = $row_how['how_image'];
?>
<div class="page-head_agile_info_w3l">
		<div class="container dottedline-bheim">
			<h3>How to <span>Buy </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>How to Buy</li>
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
				<div id="myCarousela" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<div class="carousel-inner fromtopspacebheim" role="listbox">
                            <?php

                            $get_howtos = "select * from howto LIMIT 0,1";
                            $run_howtos = mysqli_query($con,$get_howtos);
                            while($row_howtos=mysqli_fetch_array($run_howtos)){
							$how_title = $row_howtos['how_title'];
							$how_desc = $row_howtos['how_desc'];
							$how_image = $row_howtos['how_image'];

                            echo "

                            <div class='item active'>
                            <img src='admin_area/howto_images/$how_image'>
							<p class='howtobuy'>$how_desc</p>
                            </div>

                            ";
                            }		
							?>
                            <?php

                            $get_howtos = "select * from howto LIMIT 1,9";
                            $run_howtos = mysqli_query($con,$get_howtos);
                            while($row_howtos=mysqli_fetch_array($run_howtos)){
							$how_title = $row_howtos['how_title'];
							$how_desc = $row_howtos['how_desc'];
							$how_image = $row_howtos['how_image'];

                            echo "

                            <div class='item'>
                            <img src='admin_area/howto_images/$how_image'>
							<p class='howtobuy'>$how_desc</p>
                            </div>

                            ";
                            }		
							?>							
					</div>
						<a class="left carousel-control" href="#myCarousela" role="button" data-slide="prev" style="background-image:none !important; background-color:#transparent !important;">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousela" role="button" data-slide="next" style="background-image:none !important; background-color:#transparent !important;">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>					
				</div>
				  <div class="clearfix"></div>
			</div>    

		 </div> 
    </div>
	<!-- team -->

  <!-- banner-bootom-w3-agileits -->

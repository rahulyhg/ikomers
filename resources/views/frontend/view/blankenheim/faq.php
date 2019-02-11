<?php
$get_faq = "select * from faq";

$run_faq = mysqli_query($con,$get_faq);

$row_faq = mysqli_fetch_array($run_faq);

$faq_title = $row_faq['faq_title'];
$faq_desc = $row_faq['faq_desc'];
?>
<div class="page-head_agile_info_w3l">
		<div class="container dottedline-bheim">
			<h3>Frequenty Asked <span>Questions </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>FAQ Page</li>
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
				 <div class="col-md-12 ab_pic_w3ls_text_info">
				    <h5><?php echo $faq_title ?> </h5>
					<p><?php echo $faq_desc ?></p>
				</div>
				  <div class="clearfix"></div>
			</div>    

		 </div> 
    </div>
	<!-- team -->

  <!-- banner-bootom-w3-agileits -->

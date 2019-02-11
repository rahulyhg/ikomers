 <?php
        $get_product = "select * from products where product_url='$_GET[product_title]'";
        $run_product = mysqli_query($con,$get_product);
        $check_product = mysqli_num_rows($run_product);
            if($check_product == 0){
                echo "<script> window.open('index.php','_self') </script>";
            }
else{

	include ('product-query.php');
?>

<!--/single_page-->
       <!-- /banner_bottom_agile_info -->
		<div class="page-head_agile_info_w3l">
				<div class="container dottedline-bheim">
					<h3><?php echo $pro_title ?></h3>
					<!--/w3_short-->
						 <div class="services-breadcrumb">
								<div class="agile_inner_breadcrumb">

								   <ul class="w3_short">
										<li><a href="index.php">Home</a><i>|</i></li>
										<li><a href=""><?php echo $p_cat_title ?></a><i>|</i></li>
										<li><?php echo $pro_title ?></li>
									</ul>
								 </div>
						</div>
			   <!--//w3_short-->
			</div>
		</div>

  <!-- banner-bootom-w3-agileits -->
<div class="products spaceproheim">
	<div class="container">
		<div class="single-page">
		<div class="single-page-row" id="detail-21">
	     <div class="col-md-6 single-top-left">
				<div class="flexslider">			
					<ul class="slides">
						<li data-thumb=<?php echo $small1 ?>>
							<div class="thumb-image detail_images"> <img src=<?php echo $real1 ?> data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<li data-thumb=<?php echo $small2 ?>>
							<div class="thumb-image"> <img src=<?php echo $real2 ?> data-imagezoom="true" class="img-responsive"> </div>
						</li>	
						<li data-thumb=<?php echo $small3 ?>>
							<div class="thumb-image"> <img src=<?php echo $real3 ?> data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<li data-thumb=<?php echo $small4 ?>>
							<div class="thumb-image"> <img src=<?php echo $real4 ?> data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<li data-thumb=<?php echo $small5 ?>>
							<div class="thumb-image"> <img src=<?php echo $real5 ?> data-imagezoom="true" class="img-responsive"> </div>
						</li>						
					</ul>
				</div>	
		</div>
		

		<?php include ('add-cart.php'); ?>
		<form action="" method="post" >
		<div class="col-md-6 single-right-left simpleCart_shelfItem  prospecheim" >
					<!--price code-->
						<?php include ('product-price.php');?>
					<!--price code-->		
					<h4>Prices :</h4>
					<p><span class="item_price"><?php echo $discount_price. "</span>" .$product_psp_price ?></p>
					<div class="color-quality">
						<div class="color-quality-right">
							<h5>Quantity :</h5>
							<select name="product_qty" class="form-control" style="width:50%;">
								<option value="1">1</option>
								<option value="2">2</option> 
								<option value="3">3</option>					
								<option value="4">4</option>								
								<option value="5">5</option>								
								<option value="6">6</option>								
								<option value="7">7</option>								
								<option value="8">8</option>								
								<option value="9">9</option>								
								<option value="10">10</option>								
							</select>
						</div>
					</div>
					<?php
					if ($p_cat_title != 'Footwear'){
						echo '
						<div class="occasional">
						  <div class="form-group sizeheim">
						  </div>
						</div>
						';
					}
					else{
						echo'

					<div class="occasional">
						  <div class="form-group sizeheim">
						  <h4>Choose Size</h4></br>
							<div data-toggle="buttons">
							  <label class="btn btn-default btn-circle btn-lg"  style="background-color:#f58634 !important;"><input type="radio" name="product_size" value="39">39</label>
							  <label class="btn btn-default btn-circle btn-lg" style="background-color:#f58634 !important;"><input type="radio" name="product_size" value="40">40</label>
							  <label class="btn btn-default btn-circle btn-lg" style="background-color:#f58634 !important;"><input type="radio" name="product_size" value="41">41</label>
							  <label class="btn btn-default btn-circle btn-lg" style="background-color:#f58634 !important;"><input type="radio" name="product_size" value="42">42</label>
							  <label class="btn btn-default btn-circle btn-lg" style="background-color:#f58634 !important;"><input type="radio" name="product_size" value="43">43</label>
							  <label class="btn btn-default btn-circle btn-lg" style="background-color:#f58634 !important;"><input type="radio" name="product_size" value="44">44</label>
							</div>
						  </div>
					</div>						
						';
					}
					?>
					
									
					<div class="occasion-cart">
					<div class="row">
						<div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
						<button class="newbutton" type="submit" name="add_cart">

						<i class="fa fa-shopping-cart" ></i> Add to cart</button>
						</div>
						<div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
						<button class="wishlistbutton" type="submit" name="add_wishlist">

						<i class="fa fa-heart" ></i> Add to wishlist</button>																		
						</div>
					</div>
					</div>
					<ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
						                                   <li class="share">share on : </li>
															<li><a href="https://web.facebook.com/blankenheimID?_rdc=1&_rdr" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="https://twitter.com/blankenheimID" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="https://www.instagram.com/blankenheimstyle/?hl=en" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="https://id.pinterest.com/blankenheim/" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
					</ul>
						</form>
					<div class="description">
						<h5>don't have much time for checkout ? let's make it quick by whatsapp!</h5>
						 
						<a href=<?php echo "https://api.whatsapp.com/send?phone=628118582207&text=hallo%20Blankenheim,Saya%20Mau%20Pesan%20".$pro_whatsapp."%20Apakah%20Masih%20Tersedia?";?> target="_blank">
						<div class="row">
						<div class="col-md-offset-1 col-md-8 col-sm-12 col-xs-12">
						<div class="whatsappbutton">
						<i class="fa fa-whatsapp" aria-hidden="true"></i> Quick Order
						</div>
						</div>
						</div>
						</a>
						
					</div>
			<?php include ('wishlist.php');?>
		</div>
		</form>
	 			<div class="clearfix"> </div>
		</div>
		</div>
				<!-- /new_arrivals --> 
	<div class="responsive_tabs_agileits"> 
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Description</li>
							<li>Reviews</li>
							<li>Size guide</li>
						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
					   <div class="tab1">

							<div class="single_page_agile_its_w3ls">
							  <h6>Product description of <?php echo $pro_title ?></h6>
							   <p><?php echo $pro_desc ?></p>
							</div>
						</div>
						<!--//tab_one-->
						<div class="tab2">
							
							<div class="single_page_agile_its_w3ls">
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
										<div class="bootstrap-tab-text-grid-left">
											<img src="images/t1.jpg" alt=" " class="img-responsive">
										</div>
										<div class="bootstrap-tab-text-grid-right">
											<ul>
												<li><a href="#">Admin</a></li>
												<li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</a></li>
											</ul>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis 
												suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem 
												vel eum iure reprehenderit.</p>
										</div>
										<div class="clearfix"> </div>
						             </div>
									 <div class="add-review">
										<h4>add a review</h4>
										<form action="#" method="post">
												<input type="text" name="Name" required="Name">
												<input type="email" name="Email" required="Email"> 
												<textarea name="Message" required=""></textarea>
											<input type="submit" value="SEND">
										</form>
									</div>
								 </div>
								 
							 </div>
						 </div>
						   <div class="tab3">

							<div class="single_page_agile_its_w3ls">
							  <h6>SIZE GUIDE</h6>
								<div class="container">
									<div class="row">
										<table class="table table-bordered">
									<thead>
									  <tr>
										<th>EURO</th>
										<th>CM</th>
										<th>UK</th>
									  </tr>
									</thead>
									<tbody>
									  <tr>
										<td>39</td>
										<td>25.5</td>
										<td>8</td>
									  </tr>									  									
									  <tr>
										<td>40</td>
										<td>26</td>
										<td>8.5</td>
									  </tr>
									  <tr>
										<td>41</td>
										<td>26.5</td>
										<td>9</td>
									  </tr>
									  <tr>
										<td>42</td>
										<td>27</td>
										<td>9.5</td>
									  </tr>
									  <tr>
										<td>43</td>
										<td>27.5</td>
										<td>10</td>
									  </tr>
									  <tr>
										<td>44</td>
										<td>28</td>
										<td>10.5</td>
									  </tr>
									</tbody>
								  </table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
	<!-- //new_arrivals --> 
	  	<!--/slider_owl-->
	</div>
 </div>
<!--//single_page-->		


<!--see other products-->
<div class="products spaceproheim ">
	<div class="container lineheimprod">
		<div class="single-page ">
			<div class="single_page_agile_its_w3ls centerheim ">
			<h6>you might also like these products</h6>
			<?php include ('other-products.php');?>
			</div>
		</div>
	</div>
</div>
<!--see other products-->


	
<?php } ?>



	

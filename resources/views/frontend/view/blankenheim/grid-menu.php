  <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
	<div class="container">
                            <?php

                            $get_grid = "select * from boxes_section WHERE box_id = 1";

                            $run_grid = mysqli_query($con,$get_grid);

                            while($row_grid=mysqli_fetch_array($run_grid)){

                            $grid_desc = $row_grid['box_desc'];
                            $grid_url = $row_grid['box_url'];
                            $grid_image = $row_grid['box_image'];
							$grid_fronttext = substr($row_grid['box_title'],0,1);							
							$grid_name = substr($row_grid['box_title'],1,10);							

                            echo "
							<div class='hidden-md hidden-lg hidden-sm col-xs-12 bb-grids bb-left-agileits-w3layouts'>
								<a href='$grid_url'>
								   <div class='bb-left-agileits-w3layouts-inner grid '>
									<figure class='effect-roxy'>
											<img src='boxes_images/$box_image' alt=' ' class='img-responsive' />
											<figcaption>
												<h3><span>$grid_fronttext</span>$grid_name </h3>
												<p>$grid_desc</p>
											</figcaption>			
										</figure>
								</div>
							</a>
							<div class='clearfix'></div>							
							</div>

                            ";
                            }

                            ?>	
                            <?php

                            $get_grid = "select * from boxes_section WHERE box_id = 1";

                            $run_grid = mysqli_query($con,$get_grid);

                            while($row_grid=mysqli_fetch_array($run_grid)){

                            $grid_desc = $row_grid['box_desc'];
                            $grid_url = $row_grid['box_url'];
                            $grid_image = $row_grid['box_image'];
							$grid_fronttext = substr($row_grid['box_title'],0,1);							
							$grid_name = substr($row_grid['box_title'],1,10);							

                            echo "
							<div class='col-md-3 col-xs-6 bb-grids bb-middle-agileits-w3layouts'>
							<a href='$grid_url' target='_blank'>
							   <div class='bb-middle-agileits-w3layouts grid '>
									<figure class='effect-roxy'>
											<img src='admin_area/boxes_images/$grid_image' alt=' ' class='img-responsive' />
											<figcaption>
												<h3><span>$grid_fronttext</span>$grid_name </h3>
												<p>$grid_desc</p>
											</figcaption>			
										</figure>
								</div>
							</a>
							</div>

                            ";
                            }

                            ?>	
		
                            <?php

                            $get_grid = "select * from boxes_section WHERE box_id = 2";

                            $run_grid = mysqli_query($con,$get_grid);

                            while($row_grid=mysqli_fetch_array($run_grid)){

                            $grid_desc = $row_grid['box_desc'];
                            $grid_url = $row_grid['box_url'];
                            $grid_image = $row_grid['box_image'];
							$grid_fronttext = substr($row_grid['box_title'],0,1);							
							$grid_name = substr($row_grid['box_title'],1,10);							

                            echo "
							<div class='col-md-3 col-xs-6 bb-grids bb-middle-agileits-w3layouts'>
							<a href='$grid_url' target='_blank'>
							   <div class='bb-middle-agileits-w3layouts grid '>
									<figure class='effect-roxy'>
											<img src='admin_area/boxes_images/$grid_image' alt=' ' class='img-responsive' />
											<figcaption>
												<h3><span>$grid_fronttext</span>$grid_name </h3>
												<p>$grid_desc</p>
											</figcaption>			
										</figure>
								</div>
							</a>
							<div class='clearfix'></div>							
							</div>

                            ";
                            }

                            ?>			
                            <?php

                            $get_grid = "select * from boxes_section WHERE box_id = 4";

                            $run_grid = mysqli_query($con,$get_grid);

                            while($row_grid=mysqli_fetch_array($run_grid)){

                            $grid_desc = $row_grid['box_desc'];
                            $grid_url = $row_grid['box_url'];
                            $grid_image = $row_grid['box_image'];
							$grid_fronttext = substr($row_grid['box_title'],0,1);							
							$grid_name = substr($row_grid['box_title'],1,10);							

                            echo "
							<div class='col-md-6 hidden-xs bb-grids bb-left-agileits-w3layouts'>
							<a href='$grid_url' target='_blank'>
							   <div class='bb-left-agileits-w3layouts-inner grid'>
									<figure class='effect-roxy'>
											<img src='admin_area/boxes_images/$grid_image' alt=' ' class='img-responsive' />
											<figcaption>
												<h3><span>$grid_fronttext</span>$grid_name </h3>
												<p>$grid_desc</p>
											</figcaption>			
										</figure>
								</div>
							</a>
							</div>

                            ";
                            }

                            ?>		
	
	</div>
	<div class="container space-bheim">
                            <?php

                            $get_grid = "select * from boxes_section WHERE box_id = 6";

                            $run_grid = mysqli_query($con,$get_grid);

                            while($row_grid=mysqli_fetch_array($run_grid)){

                            $grid_desc = $row_grid['box_desc'];
                            $grid_url = $row_grid['box_url'];
                            $grid_image = $row_grid['box_image'];
							$grid_fronttext = substr($row_grid['box_title'],0,1);							
							$grid_name = substr($row_grid['box_title'],1,10);							

                            echo "
							<div class='col-md-6 hidden-xs bb-grids bb-left-agileits-w3layouts'>
							<a href='$grid_url' target='_blank'>
							   <div class='bb-left-agileits-w3layouts-inner grid'>
									<figure class='effect-roxy'>
											<img src='admin_area/boxes_images/$grid_image' alt=' ' class='img-responsive' />
											<figcaption>
												<h3><span>$grid_fronttext</span>$grid_name </h3>
												<p>$grid_desc</p>
											</figcaption>			
										</figure>
								</div>
							</a>
							</div>

                            ";
                            }

                            ?>		
                            <?php

                            $get_grid = "select * from boxes_section WHERE box_id = 3";

                            $run_grid = mysqli_query($con,$get_grid);

                            while($row_grid=mysqli_fetch_array($run_grid)){

                            $grid_desc = $row_grid['box_desc'];
                            $grid_url = $row_grid['box_url'];
                            $grid_image = $row_grid['box_image'];
							$grid_fronttext = substr($row_grid['box_title'],0,1);							
							$grid_name = substr($row_grid['box_title'],1,10);							

                            echo "
							<div class='col-md-3 col-xs-6 bb-grids bb-middle-agileits-w3layouts'>
							<a href='$grid_url' target='_blank'>
							   <div class='bb-middle-agileits-w3layouts grid '>
									<figure class='effect-roxy'>
											<img src='admin_area/boxes_images/$grid_image' alt=' ' class='img-responsive' />
											<figcaption>
												<h3><span>$grid_fronttext</span>$grid_name </h3>
												<p>$grid_desc</p>
											</figcaption>			
										</figure>
								</div>
							</a>
							<div class='clearfix'></div>							
							</div>

                            ";
                            }

                            ?>	
		
                            <?php

                            $get_grid = "select * from boxes_section WHERE box_id =5";

                            $run_grid = mysqli_query($con,$get_grid);

                            while($row_grid=mysqli_fetch_array($run_grid)){

                            $grid_desc = $row_grid['box_desc'];
                            $grid_url = $row_grid['box_url'];
                            $grid_image = $row_grid['box_image'];
							$grid_fronttext = substr($row_grid['box_title'],0,1);							
							$grid_name = substr($row_grid['box_title'],1,10);							

                            echo "
							<div class='col-md-3 col-xs-6 bb-grids bb-middle-agileits-w3layouts'>
							<a href='$grid_url' target='_blank'>
							   <div class='bb-middle-agileits-w3layouts grid '>
									<figure class='effect-roxy'>
											<img src='admin_area/boxes_images/$grid_image' alt=' ' class='img-responsive' />
											<figcaption>
												<h3><span>$grid_fronttext</span>$grid_name </h3>
												<p>$grid_desc</p>
											</figcaption>			
										</figure>
								</div>
							</a>
							<div class='clearfix'></div>							
							</div>

                            ";
                            }

                            ?>		
	
	
	</div>	
    </div>
<!--/grids-->
<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->

		<div class="carousel-inner fromtopspacebheim" role="listbox">
                            <?php

                            $get_slides = "select * from slider LIMIT 0,1";

                            $run_slides = mysqli_query($con,$get_slides);

                            while($row_slides=mysqli_fetch_array($run_slides)){

                            $slide_name = $row_slides['slide_name'];
                            $slide_image = $row_slides['slide_image'];

                            $slide_url = $row_slides['slide_url'];

                            echo "

                            <div class='item active'>
                            <img src='admin_area/slides_images/$slide_image'>
							<div class='container'>
								<div class='carousel-caption'>
									<h3>$slide_name</h3>
									<p>Special for today</p>
									<a class='hvr-outline-out button2' href='$slide_url'>Shop Now </a>
								</div>
							</div>
                            </div>

                            ";
                            }

                            ?>
                                <?php

                                $get_slides = "select * from slider LIMIT 1,3 ";

                                $run_slides = mysqli_query($con,$get_slides);

                                while($row_slides = mysqli_fetch_array($run_slides)) {


                                $slide_name = $row_slides['slide_name'];

                                $slide_image = $row_slides['slide_image'];

                                $slide_url = $row_slides['slide_url'];

                                echo "

                                <div class='item'>

                                <a href='$slide_url'><img src='admin_area/slides_images/$slide_image'></a>
								<div class='container'>
									<div class='carousel-caption'>
										<h3>$slide_name</h3>
										<p>Special for today</p>
										<a class='hvr-outline-out button2' href='$slide_url'>Shop Now </a>
									</div>
								</div>
                                </div>

                                ";


                                }



                                ?>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
    </div> 
	<!-- //banner -->
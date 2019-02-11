<!-- banner -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->

		<div class="carousel-inner fromtopspacebheim" role="listbox">
            
            @foreach ($slider_active as $slider)
                    <div class='item active'>
                        <a href='{{ $slider->sliders_url }}'><img src='{{ $slider->sliders_image }}'></a>
                        <div class='container'>
                            <div class='carousel-caption'>
                                <h3>{{ $slider->sliders_title }}</h3>
                                <p>{{ $slider->sliders_html_text }}</p>
                            </div>
                        </div>
                    </div>
            @endforeach

            @foreach ($sliders as $slider)
                    <div class='item'>
                        <a href='{{ $slider->sliders_url }}'><img src='{{ $slider->sliders_image }}'></a>
                        <div class='container'>
                            <div class='carousel-caption'>
                                <h3>{{ $slider->sliders_title }}</h3>
                                <p>{{ $slider->sliders_html_text }}</p>
                            </div>
                        </div>
                    </div>
            @endforeach

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
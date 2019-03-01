<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<!-- js -->
<script type="text/javascript" src="{!! asset('resources/views/frontend/js/jquery-2.1.4.min.js') !!}"></script>
<!-- //js -->
<script src="{!! asset('resources/views/frontend/js/modernizr.custom.js') !!}"></script>
	<!-- Custom-JavaScript-File-Links --> 
	<!-- cart-js -->
	<script src="{!! asset('resources/views/frontend/js/minicart.min.js') !!}"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>

<script>
$(function(){
    var current = window.location.href;
    $('li.menu__item a').each(function(){
        var $this = $(this);
		// if the current path is like this link, make it active
		
		console.log(current);
        if($this.attr('href') === current){
			$this.parents('.menu__item').addClass('active menu__item--current')
        }
    })
})
</script>

	<!-- //cart-js --> 
<!-- script for responsive tabs -->						
<script src="{!! asset('resources/views/frontend/js/easy-responsive-tabs.js') !!}"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- //script for responsive tabs -->		
<!-- stats -->
	<script src="{!! asset('resources/views/frontend/js/jquery.waypoints.min.js') !!}"></script>
	<script src="{!! asset('resources/views/frontend/js/jquery.countup.js') !!}"></script>
	<script>
		$('.counter').countUp();
	</script>
<!-- //stats -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{!! asset('resources/views/frontend/js/move-top.js') !!}"></script>
<script type="text/javascript" src="{!! asset('resources/views/frontend/js/jquery.easing.min.js') !!}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});

		$(window).scroll(function() {
			if ($(this).scrollTop()>1)
			{
				$('.menubawah').fadeOut(300);
			}
			else
			{
			$('.menubawah').fadeIn(300);
			}
		});
	});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->


<!-- for bootstrap working -->
<script type="text/javascript" src="{!! asset('resources/views/frontend/js/bootstrap.js') !!}"></script>
<script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '443145e0-ef9d-48ad-b545-bd2a1fc96f12', f: true }); done = true; } }; })();</script>
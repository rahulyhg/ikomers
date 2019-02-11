<?php
  error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108349646-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-108349646-1');
</script>

<!-- END Tynt Script -->
 <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta property="og:title" content="<?php include("teraskreasi_titel.php");?>">
	<meta property="og:type" content="article" />
	<meta property="fb:app_id" content="">
	<meta property="og:site_name" content="srpmedical.co.id" />
	<!--<meta property="og:description" content="<?php  include("teraskreasi1.php"); ?>">-->
	<meta property="og:image:width" content="100%">
	<meta property="og:image:height" content="100%">	
	<title><?php include ("teraskreasi_titel.php"); ?></title>
  <!--<meta name="description" content="<?php include ("teraskreasi1.php"); ?>">-->
  <!--<meta name="keywords" content="<?php include("teraskreasi2.php"); ?>">-->
  <meta name="robots" content="index, follow">
  <meta name="contact" content="admin@blankenheim.id">  
  <meta name="copyright" content="&copy; 2018 Blankenheim Style | Blankenheim.id">  
  <meta name="webcrawlers" content="all">
  <meta name="spiders" content="all">

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//tags -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link href="css/magnific-popup/magnific-popup.css" rel="stylesheet"> 
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.bootstrap3.min.css" />
<script src='https://www.google.com/recaptcha/api.js'></script>
<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/caa6556ca496759069de42125/2e8fc55613732b62278218cf3.js");</script>
</head>

<body>
	

				<?php
					include "sign-up.php";
				?>
    
    				<?php
					include "sign-in.php";
				?>


				<?php
					include "content.php";
				?>






<?php
	include "why-us.php";
?>


<?php
	include "footer.php";
?>

<?php
	include "login.php";
?>



<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- Gallery -->
<script src="js/masonry-filter/imagesloaded.min.js"></script>
<script src="js/masonry-filter/masonry-3.1.4.min.js"></script>
<script src="js/masonry-filter/masonry.filter.js"></script>
 <script src="js/isotope-docs.min.js?6"></script> 

<!-- Magnific Popup-->
<script src="js/magnific-popup/jquery.magnific-popup.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.5/lodash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
<!-- //js -->
<script src="js/modernizr.custom.js"></script>
	<!-- Custom-JavaScript-File-Links --> 
	<!-- cart-js -->
	<script src="js/minicart.min.js"></script>
	
	
<script>
// external js: isotope.pkgd.js, imagesloaded.pkgd.js

// init Isotope
var $grid = $('.grid').isotope({
  itemSelector: '.grid-item',
  percentPosition: true,
  masonry: {
    columnWidth: '.grid-sizer'
  }
});
// layout Isotope after each image loads
$grid.imagesLoaded().progress( function() {
  $grid.isotope('layout');
});  

</script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>

	<!-- //cart-js --> 
	
	
<!-- stats -->
<script src="js/imagezoom.js"></script>
<!-- script for responsive tabs -->						
<script src="js/easy-responsive-tabs.js"></script>

<!-- //script for responsive tabs -->	
<script src="js/jquery.flexslider.js"></script>
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								slideshow: false,
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
<!-- //script for responsive tabs -->	

	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
<!-- //stats -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
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
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '443145e0-ef9d-48ad-b545-bd2a1fc96f12', f: true }); done = true; } }; })();</script>

<script src="js/imagezoom.js"></script>
<!-- FlexSlider -->
<script src="js/jquery.flexslider.js"></script>
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								slideshow: false,
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
<!-- //script for responsive tabs -->		
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>

							<script type='text/javascript'>//<![CDATA[ 
							$(window).load(function(){
							 $( "#slider-range" ).slider({
										range: true,
										min: 0,
										max: 1000000,
										values: [ 300000, 800000 ],
										slide: function( event, ui ) {  $( "#amount" ).val( "Rp. " + ui.values[ 0 ] + " - Rp. " + ui.values[ 1 ] );
										}
							 });
							$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

							});//]]>  

							</script>
						<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="js/bootsnav.js"></script>
<script type="text/javascript" src="js/parallax.js"></script>
<script type="text/javascript" src="js/scrollto.js"></script>
<script type="text/javascript" src="js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="js/jquery.counterup.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/video-player.js"></script>
<script type="text/javascript" src="js/jquery.barfiller.js"></script>
<script type="text/javascript" src="js/timepicker.js"></script>
<!-- Custom script for all pages --> 
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>


<script>
$(document).ready(function(){
    
    var clickEvent = false;
	$('#myCarousela').carousel({
		interval:   false	
	}).on('click', '.list-group li', function() {
			clickEvent = true;
			$('.list-group li').removeClass('active');
			$(this).addClass('active');		
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.list-group').children().length -1;
			var current = $('.list-group li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.list-group li').first().addClass('active');	
			}
		}
		clickEvent = false;
	});
})

$(window).load(function() {
    var boxheight = $('#myCarousela .carousel-inner').innerHeight();
    var itemlength = $('#myCarousela .item').length;
    var triggerheight = Math.round(boxheight/itemlength+1);
	$('#myCarousel .list-group-item').outerHeight(triggerheight);
});
</script>

<script>
(function(){
  // setup your carousels as you normally would using JS
  // or via data attributes according to the documentation
  // https://getbootstrap.com/javascript/#carousel
  $('#carousel123').carousel({ interval: false });
  $('#carouselABC').carousel({ interval: false });
}());

(function(){
  $('.carousel-showsixmoveone .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<4;i++) {
      itemToClone = itemToClone.next();

      // wrap around if at end of item collection
      if (!itemToClone.length) {
        itemToClone = $(this).siblings(':first');
      }

      // grab item, clone, add marker class, add to collection
      itemToClone.children(':first-child').clone()
        .addClass("cloneditem-"+(i))
        .appendTo($(this));
    }
  });
}());
</script>

<script>

$(document).ready(function(){

/// Hide And Show Code Starts ///

$('.nav-toggle').click(function(){

$(".panel-collapse,.collapse-data").slideToggle(700,function(){

if($(this).css('display')=='none'){

$(".hide-show").html('Show');

}
else{

$(".hide-show").html('Hide');

}

});

});

/// Hide And Show Code Ends ///

/// Search Filters code Starts /// 

$(function(){

$.fn.extend({

filterTable: function(){

return this.each(function(){

$(this).on('keyup', function(){

var $this = $(this), 

search = $this.val().toLowerCase(), 

target = $this.attr('data-filters'), 

handle = $(target), 

rows = handle.find('li a');

if(search == '') {

rows.show(); 

} else {

rows.each(function(){

var $this = $(this);

$this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();

});

}

});

});

}

});

$('[data-action="filter"][id="dev-table-filter"]').filterTable();

});

/// Search Filters code Ends /// 

});

 

</script>


<!-- script for registration blankenheim -->
<script>

$(document).ready(function(){

$('.tick1').hide();
$('.cross1').hide();

$('.tick2').hide();
$('.cross2').hide();


$('.confirm').focusout(function(){

var password = $('#pass').val();

var confirmPassword = $('#con_pass').val();

if(password == confirmPassword){

$('.tick1').show();
$('.cross1').hide();

$('.tick2').show();
$('.cross2').hide();



}
else{

$('.tick1').hide();
$('.cross1').show();

$('.tick2').hide();
$('.cross2').show();


}


});


});

</script>
<!-- script for registration blankenheim -->


<!-- script for registration blankenheim -->

<script>

$(document).ready(function(){

$("#pass").keyup(function(){

check_pass();

});

});

function check_pass() {
 var val=document.getElementById("pass").value;
 var meter=document.getElementById("meter");
 var no=0;
 if(val!="")
 {
// If the password length is less than or equal to 6
if(val.length<=6)no=1;

 // If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
  if(val.length>6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))no=2;

  // If the password length is greater than 6 and contain alphabet,number,special character respectively
  if(val.length>6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))))no=3;

  // If the password length is greater than 6 and must contain alphabets,numbers and special characters
  if(val.length>6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))no=4;

  if(no==1)
  {
   $("#meter").animate({width:'50px'},300);
   meter.style.backgroundColor="red";
   document.getElementById("pass_type").innerHTML="Very Weak";
  }

  if(no==2)
  {
   $("#meter").animate({width:'100px'},300);
   meter.style.backgroundColor="#F5BCA9";
   document.getElementById("pass_type").innerHTML="Weak";
  }

  if(no==3)
  {
   $("#meter").animate({width:'150px'},300);
   meter.style.backgroundColor="#FF8000";
   document.getElementById("pass_type").innerHTML="Good";
  }

  if(no==4)
  {
   $("#meter").animate({width:'200px'},300);
   meter.style.backgroundColor="#00FF40";
   document.getElementById("pass_type").innerHTML="Strong";
  }
 }

 else
 {
  meter.style.backgroundColor="";
  document.getElementById("pass_type").innerHTML="";
 }
}

</script>
<!-- script for registration blankenheim -->

<script>
$(function() {
  $('.muntjul').hide();
  $(window).scroll(function() {
  var scroll = $(window).scrollTop();
  if (scroll >= 100) {
  $('.nuluhur , .menubawah').hide();
  $('.muntjul').show();
  } else {
  $('.nuluhur , .menubawah').show();
  $('.muntjul').hide();
  }
 });
})
</script>

<script>
    
function updatestate(){
var idh = document.getElementById("idhidden").value;
var provinsi = document.getElementById("select-state").value;
var kota = document.getElementById("select-city").value;
var tarif = document.getElementById("select-region").value;
var reg = document.getElementById("shippingCosthide").value;
var qty = document.getElementById("qtyhidden").value;

$.ajax({

url:"change.php",

method:"POST",

data:{id:idh, quantity:qty, provinsi:provinsi , kota:kota , tarif:tarif, reg:reg},






});


}

</script>


<script>

$(document).ready(function(data){

$(document).on('keyup', '.quantity', function(){

var id = $(this).data("product_id");
var provinsi = document.getElementById("select-state").value;
var kota = document.getElementById("select-city").value;
var tarif = document.getElementById("select-region").value;
var reg = document.getElementById("shippingCosthide").value;

var quantity = $(this).val();
if(quantity  != ''){

$.ajax({

url:"change.php",

method:"POST",

data:{id:id, quantity:quantity, provinsi:provinsi , kota:kota , tarif:tarif, reg:reg},






});


}




});




});

</script>

<script>


$(document).ready(function(){
 
  // getProducts Function Code Starts 

  function getProducts(){
  
  // Manufacturers Code Starts 

    var sPath = ''; 

var aInputs = $('li').find('.get_manufacturer');

var aKeys = Array();

var aValues = Array();

iKey = 0;

$.each(aInputs,function(key,oInput){

if(oInput.checked){

aKeys[iKey] =  oInput.value

};

iKey++;

});

if(aKeys.length>0){

var sPath = '';

for(var i = 0; i < aKeys.length; i++){

sPath = sPath + 'man[]=' + aKeys[i]+'&'; 

}

}

// Manufacturers Code ENDS 

// Products Categories Code Starts 

var aInputs = Array();

var aInputs = $('li').find('.get_p_cat');

var aKeys = Array();

var aValues = Array();

iKey = 0;

$.each(aInputs,function(key,oInput){

if(oInput.checked){

aKeys[iKey] =  oInput.value

};

iKey++;

});

if(aKeys.length>0){

for(var i = 0; i < aKeys.length; i++){

sPath = sPath + 'p_cat[]=' + aKeys[i]+'&';

}

}

// Products Categories Code ENDS 

   // Categories Code Starts 

var aInputs = Array();

var aInputs = $('li').find('.get_cat');

var aKeys  = Array();

var aValues = Array();

iKey = 0;

    $.each(aInputs,function(key,oInput){

    if(oInput.checked){

    aKeys[iKey] =  oInput.value

};

    iKey++;

});

if(aKeys.length>0){

    for(var i = 0; i < aKeys.length; i++){

    sPath = sPath + 'cat[]=' + aKeys[i]+'&';

}

}

   // Categories Code ENDS 
   
   // Loader Code Starts 

$('#wait').html('<img src="images/load.gif">'); 

// Loader Code ENDS

// ajax Code Starts 

$.ajax({

url:"load.php", 
 
method:"POST",
 
data: sPath+'sAction=getProducts', 
 
success:function(data){
 
 $('#Products').html('');  
 
 $('#Products').html(data);
 
 $("#wait").empty(); 
 
}  

});  

    $.ajax({
url:"load.php",  
method:"POST",  
data: sPath+'sAction=getPaginator',  
success:function(data){
$('.pagination').html('');  
$('.pagination').html(data);
}  

    });

// ajax Code Ends 
   
   }

   // getProducts Function Code Ends    

$('.get_manufacturer').click(function(){ 

getProducts(); 

});


  $('.get_p_cat').click(function(){ 

getProducts();

}); 

$('.get_cat').click(function(){ 

getProducts(); 

});
 
 
 }); 

</script>

<script>
$(function() {
  $('.muntjul2').hide();
  $(window).scroll(function() {
  var scroll = $(window).scrollTop();
  if (scroll >= 50) {
  $('.nuluhur2 , .menubawah2').hide();
  $('.muntjul2').show();
  } else {
  $('.nuluhur2 , .menubawah2').show();
  $('.muntjul2').hide();
  }
 });
})
</script>
    
<script>
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}    
</script>

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
	$totalSummary = $('#totalSummary');
	$postalCodeInput = $('#input-postalCode');
	$shippingCost = $('#shippingCost');
	$selectRegion = $('#select-region').selectize({
		valueField: 'id_kecamatan',
		labelField: 'kecamatan',
		searchField: ['kecamatan'],
		onChange: function(value) {
			var region = _.find(
				JSON.parse(localStorage.getItem('regions')),
				{'id_kecamatan': _.toNumber(value)}
			);
			var total = _.toNumber($totalSummary.data('total'));
			$postalCodeInput.val(region.kodepos);
			$shippingCost.text('IDR ' + region._reg.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
			document.getElementById('shippingCosthide').value=region._reg;
			$totalSummary.text('IDR ' + (total + region._reg).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
		}
	});
	$selectRegion[0].selectize.disable();
	$selectCity = $('#select-city').selectize({
		valueField: 'id_kota',
		labelField: 'nama_kota',
		searchField: ['nama_kota'],
		onChange: function(value) {
			$selectRegion[0].selectize.disable();
			$selectRegion[0].selectize.clearOptions();
			$selectRegion[0].selectize.load(function(cb) {
				var regions = _.filter(
					JSON.parse(localStorage.getItem('regions')),
					{'id_kota': _.toNumber(value)}
				);
				cb(regions);
			$selectRegion[0].selectize.enable();
			});
		}
	});
	$selectCity[0].selectize.disable();
	$('#select-state').selectize({
		onChange: function(value) {
			$selectCity[0].selectize.disable();
			$selectCity[0].selectize.clearOptions();
			$selectCity[0].selectize.load(function(cb) {
				var cities = _.filter(
					JSON.parse(localStorage.getItem('cities')),
					{'id_provinsi': _.toNumber(value)}
				);
				cb(cities);
			$selectCity[0].selectize.enable();
			});
		}
	});
	});
</script>
	<script src="js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
</body>
</html>
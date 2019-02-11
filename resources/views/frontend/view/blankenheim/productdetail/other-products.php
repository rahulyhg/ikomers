<?php

if($status == "product"){



?>


<?php

$get_products = "select * from products order by rand() LIMIT 0,4";

$run_products = mysqli_query($con,$get_products); 

while($row_products = mysqli_fetch_array($run_products)) {

$pro_id = $row_products['product_id'];

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];

$pro_img1 = $row_products['product_img1'];
$pro_img2 = $row_products['product_img3'];

$pro_label = $row_products['product_label'];

$manufacturer_id = $row_products['manufacturer_id'];

$get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

$run_manufacturer = mysqli_query($db,$get_manufacturer);

$row_manufacturer = mysqli_fetch_array($run_manufacturer);

$manufacturer_name = $row_manufacturer['manufacturer_title'];

$pro_psp_price = $row_products['product_psp_price'];

$pro_url = $row_products['product_url'];
if($pro_label == "Sale" or $pro_label == "Gift"){
$product_psp_price = "<del> IDR"." ".number_format($pro_psp_price,0, ",", ".")."</del>";
$discount_price = "IDR"." ".number_format($disc_price,0, ",", ".")."";
}
else{
$discount_price = "";
$product_psp_price = " IDR"." ".number_format($pro_psp_price,0, ",", ".")."";
}

if($pro_label == "product"){


}
else{
$product_label = "
<span class='product-new-top'>$pro_label</span>
";
}


$product1 = "admin_area/product_images/".$pro_url."_med_".$pro_img1;
$product2 = "admin_area/product_images/".$pro_url."_med_".$pro_img2;


echo "
	<div class='item active'>
		<div class='col-xs-12 col-sm-4 col-md-3'>
		<div class='men-pro-item simpleCart_shelfItem'>
			<div class='men-thumb-item'>
			<img src= $product1 alt='$pro_title' class='pro-image-front' >
			<img src= $product2  alt='$pro_title' class='pro-image-back' >
			$product_label
			</div>
		<div class='item-info-product '>
			<h4><a href='product-detail-$pro_url.html'>$pro_title</a></h4>
			<div class='info-product-price'>
			<span class='item_price'>
			$discount_price $product_psp_price
			</span>
			</div>																			
		</div>
		</div>
		</div>
	</div>
";


}


?>

<?php } ?>
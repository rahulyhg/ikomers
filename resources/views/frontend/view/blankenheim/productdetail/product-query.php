<?php


$row_product = mysqli_fetch_array($run_product);

$p_cat_id = $row_product['p_cat_id'];
    
$cat_id = $row_product['cat_id'];
    
$manufacturer_id = $row_product['manufacturer_id'];

$pro_id = $row_product['product_id'];

$pro_title = $row_product['product_title'];

$pro_price = $row_product['product_price'];

$pro_desc = $row_product['product_desc'];

$pro_img1 = $row_product['product_img1'];

$pro_img2 = $row_product['product_img2'];

$pro_img3 = $row_product['product_img3']; 
$pro_img4 = $row_product['product_img4']; 
$pro_img5 = $row_product['product_img5']; 

$pro_file = $row_product['filepdf']; 
    
$pro_stok = $row_product['stok']; 

$pro_label = $row_product['product_label'];

$pro_psp_price = $row_product['product_psp_price'];

$pro_features = $row_product['product_features'];

$pro_video = $row_product['product_video'];

$status = $row_product['status'];

$pro_url = $row_product['product_url'];            
$pro_whatsapp = str_replace(' ', '%20', $pro_title);

$small1 = "admin_area/product_images/".$pro_url."_small_".$pro_img1;
$small2 = "admin_area/product_images/".$pro_url."_small_".$pro_img2;
$small3 = "admin_area/product_images/".$pro_url."_small_".$pro_img3;
$small4 = "admin_area/product_images/".$pro_url."_small_".$pro_img4;
$small5 = "admin_area/product_images/".$pro_url."_small_".$pro_img5;

$real1 = "admin_area/product_images/".$pro_url."-".$pro_img1;
$real2 = "admin_area/product_images/".$pro_url."-".$pro_img2;
$real3 = "admin_area/product_images/".$pro_url."-".$pro_img3;
$real4 = "admin_area/product_images/".$pro_url."-".$pro_img4;
$real5 = "admin_area/product_images/".$pro_url."-".$pro_img5;

$get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

$run_manufacturer = mysqli_query($db,$get_manufacturer);

$row_manufacturer = mysqli_fetch_array($run_manufacturer);

$manufacturer_name = $row_manufacturer['manufacturer_title'];
    
$get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

$run_p_cat = mysqli_query($con,$get_p_cat);

$row_p_cat = mysqli_fetch_array($run_p_cat);

$p_cat_title = $row_p_cat['p_cat_title'];

$get_cat = "select * from categories where cat_id='$cat_id'";

$run_cat = mysqli_query($con,$get_cat);

$row_cat = mysqli_fetch_array($run_cat);

$cat_title = $row_cat['cat_title'];



    

?>
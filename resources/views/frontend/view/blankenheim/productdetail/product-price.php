<?php

if($status == "product"){




if($pro_label == "Sale" or $pro_label == "Gift"){


$product_psp_price = "<del> IDR"." ".number_format($pro_psp_price,0, ",", ".")."</del>";

$discount_price = "IDR"." ".number_format($disc_price,0, ",", ".")."";



}
else{



$discount_price = "";

$product_psp_price = " IDR"." ".number_format($pro_psp_price,0, ",", ".")."";



}

}
else{


if($pro_label == "Sale" or $pro_label == "Gift"){

$product_psp_price = "<del> IDR"." ".number_format($pro_psp_price,0, ",", ".")."</del>";

$discount_price = "IDR"." ".number_format($disc_price,0, ",", ".")."";


}
else{

$discount_price = "";

$product_psp_price = " IDR"." ".number_format($pro_psp_price,0, ",", ".")."";



}


}

?>
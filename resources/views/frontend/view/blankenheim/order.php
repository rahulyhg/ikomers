
<?php

if(isset($_GET['c_id'])){

$customer_id = $_GET['c_id'];

}

$ip_add = getRealUserIp();

$status = "pending";

$invoice_no = mt_rand();

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$pro_id = $row_cart['p_id'];
$pro_size = $row_cart['size'];
$pro_qty = $row_cart['qty'];
$tarifnya = $row_cart['tarif'];
$firstnama = $row_cart['firstname'];
$lastnama = $row_cart['lastname'];
$alamata = $row_cart['alamat'];
$prov_id = $row_cart['provinsi_id'];
$cit_id = $row_cart['kota_id'];
$kec_id = $row_cart['tarif_id'];
$telp = $row_cart['phone'];
$mail = $row_cart['email'];
$get_prov = "select * from table_provinsi where id_provinsi='$prov_id'";
$run_prov = mysqli_query($db,$get_prov);

$row_prov = mysqli_fetch_array($run_prov);

$prov_name = $row_prov['nama_provinsi'];

$get_cit = "select * from table_kota where id_kota='$cit_id'";
$run_cit = mysqli_query($db,$get_cit);

$row_cit = mysqli_fetch_array($run_cit);

$cit_name = $row_cit['nama_kota'];

$get_kec = "select * from tarif where id_tarif='$kec_id'";
$run_kec = mysqli_query($db,$get_kec);

$row_kec = mysqli_fetch_array($run_kec);

$kec_name = $row_kec['kecamatan'];
$kec_code = $row_kec['kodepos'];

$sub_total = $row_cart['p_price']*$pro_qty;
$totalnya = $sub_total + $tarifnya;


$insert_customer_order = "insert into customer_orders (customer_id,firstname,lastname,alamat,provinsi,kota,kecamatan,kodepos,phone,email,due_amount,invoice_no,qty,size,order_date,order_status) values ('1','$firstnama','$lastnama','$alamata','$prov_name','$cit_name','$kec_name','$kec_code','$telp','$mail','$totalnya','$invoice_no','$pro_qty','$pro_size',NOW(),'$status')";

$run_customer_order = mysqli_query($con,$insert_customer_order);

$insert_pending_order = "insert into pending_orders (customer_id,invoice_no,product_id,qty,size,order_status) values ('$customer_id','$invoice_no','$pro_id','$pro_qty','$pro_size','$status')";

$run_pending_order = mysqli_query($con,$insert_pending_order);

$delete_cart = "delete from cart where ip_add='$ip_add'";

$run_delete = mysqli_query($con,$delete_cart);

echo "<script>alert('Your order has been submitted,Thanks ')</script>";

echo "<script>window.open('index.html','_self')</script>";





}

?>
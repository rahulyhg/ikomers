<div class="col-md-8" id="cart" ><!-- col-md-9 Starts -->

    
    <?php
        $get_custname = "select * from customers WHERE customer_email = '$_SESSION[customer_email]' ";
        $run_custname = mysqli_query($con,$get_custname);

        $row_custname = mysqli_fetch_array($run_custname);                            
        $cust_name = $row_custname['customer_name'];
        $cust_id = $row_custname['customer_id'];
                            
        if(!isset($_SESSION['customer_email'])){
        echo "
<div class='row cartsignheim'>
    <div class='col-md-4  col-sm-12 col-xs-12'>
        You Have an Account? Please Sign in Here
    </div>
    <div class='col-md-3 col-sm-6 col-xs-6'>
        <a href='#' data-toggle='modal' data-target='#myModal'>
        <button class='btn btn-primary tombolkuponheim' value='Sign in'>
                <i class='fa fa-unlock'></i> Sign in
        </button>
        </a>
    </div>
	     <input type='hidden' name='c_id'  value='$cust_id' />
</div>";
        }
    else{
        echo "<a href='#'>Halo " . $cust_name . "</a>
	     <input type='hidden' name='c_id'  value='$cust_id' />
		";
    }
    
    ?>
    
<form action="" method="post" enctype="multipart-form-data" ><!-- form Starts -->

<?php

$ip_add = getRealUserIp();

$select_cart = "select * from cart where ip_add='$ip_add'";

function getList($con, $table) {
    $sql = "select * from " . $table;
    return mysqli_query($con,$sql);
};

$run_cart = mysqli_query($con,$select_cart);


$count = mysqli_num_rows($run_cart);

$cities = getList($con, 'table_kota');

$totalCities = mysqli_num_rows($cities);

$regions = getList($con, 'tarif');

$totalRegions = mysqli_num_rows($regions);

$provincies = getList($con, 'table_provinsi');

$totalProvincies = mysqli_num_rows($provincies);

if($totalCities > 0) {
    echo '<script>';
    echo 'var cities = [];';
    while($row = mysqli_fetch_assoc($cities)) {
        echo 'cities.push({
            id_provinsi: '.$row["id_provinsi"].',
            id_kota: '.$row["id_kota"].',
            nama_kota: "'.$row["nama_kota"].'"
        });';
    }
    echo 'localStorage.setItem("cities", JSON.stringify(cities));</script>';
}

if($totalRegions > 0) {
    echo '<script>';
    echo 'var regions = [];';
    while($row = mysqli_fetch_assoc($regions)) {
        echo 'regions.push({
            id_kecamatan: '.$row["id_tarif"].',
            id_kota: '.$row["id_kota"].',
            kecamatan: "'.$row["kecamatan"].'",
            kodepos: '.$row["kodepos"].',
            _reg: '.$row["reg"].'
        });';
    }
    echo 'localStorage.setItem("regions", JSON.stringify(regions));</script>';
}





while($row_cart = mysqli_fetch_array($run_cart)){

$pro_id = $row_cart['p_id'];
$pro_size = $row_cart['size'];
$only_price = $row_cart['p_price'];
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
?>


<div class="row  yourcartheim">
                    <!--SHIPPING METHOD-->
                        <div class="panel-body shippingform">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
									
                                </div>
                            </div>
                            <div class="form-group cartspaceheim">
                                <div class="col-md-6 col-xs-12">
                                    <p>First Name:</p>
                                    <input type="text" name="first_name" class="form-control" value="<?php echo $firstnama ?>" />
									       
	
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <p>Last Name:</p>
                                    <input type="text" name="last_name" class="form-control" value="<?php echo $lastnama ?>" />
                                </div>
                            </div>
                            <div class="form-group cartspaceheim">
                                <div class="col-md-12"><p>Address:</p></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="<?php echo $alamata ?>" />
                                </div>
                            </div>         
                                    <input type="hidden" name="tarifnya" id="shippingCosthide" value="" />
                            <div class="form-group cartspaceheim">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12"><p>State:</p></div>
                                        <div class="col-md-12">
                                            <select id="select-state" name="state" placeholder="<?php echo $prov_name ?> ">

													<option value="">Select a state...</option>
													
                                                <?php
                                                    if($totalProvincies > 0) {
                                                        while($row = mysqli_fetch_assoc($provincies)) {
                                                            echo '<option value="'.$row["id_provinsi"].'">'.$row['nama_provinsi'].'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12"><p>City:</p></div>
                                        <div class="col-md-12">
                                            <select id="select-city" name="city" placeholder="<?php echo $cit_name ?> ">
                                                <option value="">Select a city...</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group cartspaceheim">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12"><p>Region:</p></div>
                                        <div class="col-md-12">
                                            <select  id="select-region" name="region" placeholder="<?php echo $kec_name ?>">
                                                <option value="">Select a region...</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12"><p>Zip / Postal Code:</p></div>
                                        <div class="col-md-12">
                                            <input id="input-postalCode" type="text" name="zip_code" class="form-control" value="<?php echo $kec_code ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group cartspaceheim">
                                <div class="col-md-12"><p>Phone Number:</p></div>
                                <div class="col-md-12"><input type="text" name="phone_number" class="form-control" value="<?php echo $telp ?>" /></div>
                            </div>
                            <div class="form-group cartspaceheim">
                                <div class="col-md-12"><p>Email Address:</p></div>
                                <div class="col-md-12"><input type="text" name="email_address" class="form-control" value="<?php echo $mail ?>" /></div>
                            </div>
                        </div>
                    <!--SHIPPING METHOD END-->
</div>


<?php

$total = 0;


$get_products = "select * from products where product_id='$pro_id'";

$run_products = mysqli_query($con,$get_products);

while($row_products = mysqli_fetch_array($run_products)){

$product_title = $row_products['product_title'];

$product_img1 = $row_products['product_img1'];
$pro_url = $row_products['product_url'];

$product1 = "admin_area/product_images/".$pro_url."_small_".$product_img1;

$sub_total = $only_price*$pro_qty;

$_SESSION['pro_qty'] = $pro_qty;

$total += $sub_total + $tarifnya;

?>

   
    
<div class="row  yourcartheim">
	<div class="col-md-2 col-xs-3 col-sm-3">
		<img src= <?php echo $product1; ?> class="img-responsive">	
	</div>
	<div class="col-md-offset-2 col-md-5 col-xs-6 col-sm-6">
		<h5><span>Product : </span><a href=<?php echo "product-detail-".$pro_url.".html";?> > <?php echo $product_title; ?> </a></h5>		
		<h5><span>Price : </span>IDR <?php echo number_format($only_price,0, ",", "."); ?></h5>
		<h5><span>Size : </span><?php echo $pro_size; ?></h5>
		<h5><span>Quantity : </span><input type="text" name="quantity" value="<?php echo $_SESSION['pro_qty']; ?>" data-product_id="<?php echo $pro_id; ?>" class="quantity formbheim form-control newform" style="width:28%;"></h5>
		<input type="hidden" id="idhidden" name="idhide" value="<?php echo $pro_id; ?>" />
		<input type="hidden" id="qtyhidden" value="<?php echo $_SESSION['pro_qty']; ?>" />
	</div>
	<div class="col-md-3 col-xs-3 col-sm-3">
		<h6><span>Remove item : </span><input type="checkbox" style="font-size:12px !important;" name="remove[]" value="<?php echo $pro_id; ?>"></h6>
	</div>
</div>


<?php } } ?>

<!-- row bottom area blankenheim -->
<div class="row buttonareaheim"> 

<div class="col-md-3  col-xs-12 col-sm-12">
<div class="box-footer"><!-- box-footer Starts -->
<a href="blankenheim-products.html" class="btn blanjalagiheim">
<i class="fa fa-chevron-left"></i> Continue Shopping
</a>
</div><!-- box-footer Ends -->
</div><!-- col md 8 end -->

<div class="col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
<div class="row">
<div class="col-md-5 col-xs-12 col-sm-12">
<button class="btn btn-default updatecartheim" type="submit" name="update" value="Update Cart">
<i class="fa fa-refresh"></i> Update Cart
</button>
</div>

<?php
	if($_SESSION['pro_qty']==NULL || $_SESSION['pro_qty']=='0'){
		echo "<script>alert('Product Quantity Should be Inserted, Minimum 1 Quantity ')</script>";
	} 
	else{
		echo"
			<div class='col-md-7 col-xs-12 col-sm-12'>";
?>
								<?php
										   if(!isset($_SESSION['customer_email'])){
                                    echo "<a href='complete-order.html?c_id=1' class='btn btn-primary bayarheim'>Proceed to checkout <i class='fa fa-chevron-right'></i>";
											}
											else{
												 echo "<a href='complete-order.html?c_id=$cust_id' class='btn btn-primary bayarheim'>Proceed to checkout <i class='fa fa-chevron-right'></i>";
											}
									?>			

		<?php
		echo"
			</a>
			</div>
		";
	}
?>
</div><!-- end row --> 
</div><!-- col md 9 end -->

</div> <!-- row blankenheim -->

<div class="row">
<div class="col-md-6  col-sm-6 col-xs-6">
<div class="form-group"><!-- form-group Starts -->
		<label class="kuponheim">Have Coupon Code ? </label>
		<input type="text" name="code" class="form-control formbheim">
</div><!-- form-group Ends -->
</div><!-- col-md-6 ends -->

<div class="col-md-3  col-sm-6 col-xs-6 spacetombolkupon">
<input class="btn btn-primary tombolkuponheim" type="submit" name="apply_coupon" value="Apply Coupon Code" >
</div>
</div><!-- row ends --> 

</form><!-- form Ends -->


<?php 
	include ('coupon-code');
?>


<?php



if(isset($_POST['update'])){

$ip_add = getRealUserIp();
$idpro = $_POST['idhide'];
$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];
$address = $_POST['address'];
$provinsi = $_POST['state'];
$kota = $_POST['city'];
$kecamatan = $_POST['region'];
$telepon = $_POST['phone_number'];
$email = $_POST['email_address'];
$tarifnya = $_POST['tarifnya'];

	
$query = "update cart set 
		firstname='$firstname' , 
		lastname='$lastname' , 
		alamat='$address' , 
		provinsi_id='$provinsi', 
		kota_id='$kota', 
		tarif_id='$kecamatan', 
		tarif='$tarifnya', 
		phone='$telepon', 
		email='$email' 
		where p_id='$idpro' AND ip_add='$ip_add'";
$run_query = mysqli_query($db,$query);
echo "<script>alert('Click Checkout for Payment Information')</script>";
}



?>




</div><!-- col-md-9 Ends -->
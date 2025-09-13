<?php 
$date_now = date('Y-m-d');
$servername = "localhost";
$username = "kaielect_kai";
$database = "kaielect_kai";
$password = "A&I^HpMN!ti,";

$con = mysqli_connect("localhost","kaielect_kai","A&I^HpMN!ti,","kaielect_kai");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
} 

$promoCategoryId = '760';
$deleted_products = 0;
$products = [];

$select = "SELECT product_id FROM `oc_product_special` WHERE date_end < '" . $date_now . "'";

if ( $result = mysqli_query($con, $select) ) {
    // Fetch one and one row
    while ($row = mysqli_fetch_row($result)) {  
        $products[] = $row[0];
    }
    mysqli_free_result($result);
}

if( count( $products ) > 0 ){

    foreach ( $products as $product_id ) {
        
        // $check = "SELECT * FROM  oc_product_filter WHERE product_id = '" . (int)$product_id . "'";
        // $check_result = mysqli_query( $con, $check );

        // if( $check_result->num_rows > 0 ){
            
            $delete = "DELETE FROM `oc_product_to_category` WHERE product_id = '" . (int)$product_id . "' AND category_id='".(int)$promoCategoryId."'";
        
            $result = mysqli_query( $con, $delete );
         
        // }
        
        $deleted_products++;
    }
    
}

mysqli_close($con);  
 
echo $deleted_products . ' продукт(а) премахнат(и) от категория ПРОМОЦИИ';
 
<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-config.php');

$customerInfo = $_POST['customer'];
$orderInfo = $_POST['order'];

if($customerInfo && $orderInfo):
    // print_r($customerInfo);
    // print_r($orderInfo);

    foreach($customerInfo as $key => $value ){
        $customerInfoToDB .= $key . ': ' . $value . "\r\n";
    }

    
    $product_count = 1;
    foreach($orderInfo as $orderProducts){
        $orderInfoToDB .= $product_count . '. ';
        foreach($orderProducts as $key => $value ){
            $orderInfoToDB .= $key . ': ' . $value . "\r\n";
        }
        $product_count++;
    }


$user = DB_USER;
$password = DB_PASSWORD;
$db = DB_NAME;
$host = DB_HOST;
// $port = 8889;

$link = mysqli_init();
$success = mysqli_real_connect(
   $link, 
   $host, 
   $user, 
   $password, 
   $db
//    $port
);


$query = "CREATE TABLE IF NOT EXISTS `".$db."` ( `Id` INT NOT NULL AUTO_INCREMENT , `Name` TEXT NOT NULL , `Product` TEXT NOT NULL , PRIMARY KEY (`Id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci";
$result = mysqli_query($link, $query);

$query = "INSERT INTO wp_orders (`Id`,`Name`,`Product`) VALUES ('','$customerInfoToDB','$orderInfoToDB')";
$result = mysqli_query($link, $query);

$orderID = mysqli_insert_id($link);
echo $orderID;

mysqli_close($link);

unset($_SESSION['products']);
endif;
?>
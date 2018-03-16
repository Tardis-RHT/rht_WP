<?php
$customerInfo = $_POST['customer'];
$orderInfo = $_POST['order'];

print_r($customerInfo);
print_r($orderInfo);

$user = 'root';
$password = 'root';
$db = 'wp';
$host = 'localhost';
$port = 8889;

$link = mysqli_init();
$success = mysqli_real_connect(
   $link, 
   $host, 
   $user, 
   $password, 
   $db,
   $port
);


$query = "INSERT INTO wp_orders (`Name`,`Info`,`Products`) VALUES ('$name','$text','$name')";

$result = mysqli_query($link, $query);
?>
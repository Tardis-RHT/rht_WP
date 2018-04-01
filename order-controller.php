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
        $customerInfoToEmail .= "<tr>
            <td style=\"padding: 0 10px;\"><p>$key</p></td>
            <td style=\"padding: 0 10px;\"><p>$value</p></td>
        </tr>";
    }

    

    
    $product_count = 1;
    foreach($orderInfo as $orderProducts){
        $orderInfoToDB .= $product_count . '. ';
        foreach($orderProducts as $key => $value ){
            $orderInfoToDB .= $key . ': ' . $value . "\r\n";
            $orderInfoToEmail .= "<tr>
                <td style=\"padding: 0 10px;\"><p>$key</p></td>
                <td style=\"padding: 0 10px;\"><p>$value</p></td>
            </tr>";
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


$query = "CREATE TABLE IF NOT EXISTS `wpfolder`.`wp_orders` ( `Id` INT NOT NULL AUTO_INCREMENT , `Name` TEXT NOT NULL , `Product` TEXT NOT NULL , PRIMARY KEY (`Id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci";
$result = mysqli_query($link, $query);

$query = "INSERT INTO wp_orders (`Id`,`Name`,`Product`) VALUES ('','$customerInfoToDB','$orderInfoToDB')";
$result = mysqli_query($link, $query);

$orderID = mysqli_insert_id($link);
echo $orderID;

mysqli_close($link);


//SEND EMAIL
date_default_timezone_set('Europe/Kiev'); 
$curDate = date("d/m/Y") . ' в ' . date("G:i");

$message = "
<table cellspacing=\"0\" cellpadding=\"0\">
    <tbody>
    <tr>
        <td>
            <table width=\"360px\" cellspacing=\"1\" cellpadding=\"0\" border=\"2\">
                <tbody>
                    <tr>
                        <td style=\"background-color: #0071ba; padding: 10px; text-align: center;\" colspan=\"2\">
                            <strong>
                                <span style=\"color: #fff; text-align: center;\">
                                    Заказ с сайта
                                </span>
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"padding: 10px; text-align: center;\" colspan=\"2\">
                            <strong>
                                <span style=\"color: #000; text-align: center;\">
                                    Заказ
                                </span>
                            </strong>
                        </td>
                    </tr>
                    {$orderInfoToEmail}
                    <tr>
                        <td style=\"padding: 10px; text-align: center;\" colspan=\"2\">
                            <strong>
                                <span style=\"color: #000; text-align: center;\">
                                    Данные о покупателе
                                </span>
                            </strong>
                        </td>
                    </tr>
                    {$customerInfoToEmail}
                    <tr>
                        <td style=\"background: #e0e0e0; padding: 0 10px;\">
                            <p style=\"text-align: left;\">Дата и время заказа</p>
                        </td>
                        <td style=\"background: #e0e0e0; padding: 0 10px;\">
                            <p style=\"text-align: left;\">{$curDate}</p>
                        </td>
                    </tr>
                </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<br/>
-- 
This e-mail was sent from RHT shopping cart
";

$to = 'coolahhy@gmail.com';
$subject = 'RHT order';
$headers = array(
	'From: RHT-Site <me@example.net>',
	'content-type: text/html'
);

wp_mail( $to, $subject, $message, $headers );

//FINISH
unset($_SESSION['products']);
endif;
?>
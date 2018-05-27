<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

$phoneNumpber = $_POST['phoneNumber'];
$currentPage = $_POST['currentPage'];
if ($currentPage == '/'){
    $currentPage = 'main';
} else{
    $currentPage = str_replace('/', '', $currentPage); 
}
date_default_timezone_set('Europe/Kiev'); 
$curDate = date("d/m/Y") . ' в ' . date("G:i");

$message = "
<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
    <tbody>
    <tr>
        <td style=\"background: #aaaaaa;\">
            <table border=\"0\" width=\"360px\" cellspacing=\"1\" cellpadding=\"0\">
                <tbody>
                    <tr>
                        <td style=\"background-color: #0071ba; padding: 10px; text-align: center;\" colspan=\"2\">
                            <strong>
                                <span style=\"color: #fff; text-align: center;\">
                                    Заявка \"Перезвоните мне\"
                                </span>
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"background: whitesmoke; padding: 0 10px;\">
                            <p style=\"text-align: left;\">Телефон</p>
                        </td>
                        <td style=\"background: whitesmoke; padding: 0 10px;\">
                            <p style=\"text-align: left;\"><a href=\"tel:{$phoneNumpber}\">$phoneNumpber</a></p>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"background: #e0e0e0; padding: 0 10px;\">
                            <p style=\"text-align: left;\">Дата и время</p>
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
This e-mail was sent from a callback form on the {$currentPage} page
";

// remove_all_filters( 'wp_mail_from' );
// remove_all_filters( 'wp_mail_from_name' );

$to = get_theme_mod('contacts_email_to_mail', 'coolahhy@gmail.com');
$subject = 'Callback request';
$from = get_option( 'admin_email' );

$headers = array(
	'From: RHT-Site <support@digvice.kl.com.ua>',
	'content-type: text/html'
);

//For later use
// $headers = array(
// 	'From: RHT-Site <'.$from.'>',
// 	'content-type: text/html'
// );

$mailResult = false;
$mailResult = wp_mail( $to, $subject, $message, $headers );
echo $mailResult;

?>
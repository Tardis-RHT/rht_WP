<?php
define('WP_USE_THEMES', false);
require('../../../wp-load.php');
    // $headers = 'From: My Name <admin@digvice.kl.com.ua>' . "\r\n";

    // // wp_mail('coolahhy@gmail.com', 'Тема', 'Содержание', $headers);
    $post = (!empty($_POST)) ? true : false;
    if ($post){
        $tel = htmlspecialchars(trim($_POST['telephone']));
        $error = '';

        if(!$error){
            $address = "coolahhy@gmail.com";
            $from = "admin@digvice.kl.com.ua";
            $mes = "Почта: ".$from."\n\n";
            // $mes = "Почта: ".$tel."\n\nИмя: ".$tel."\n\nТема: " .$tel."\n\nСообщение: ".$tel."\n\n";
            // $mes = "Сообщение: ".$tel."\n\n";
            $send = mail ($address, $mes, "Content-type:text/plain; charset = UTF-8\r\nReply-To:$from\r\nFrom:$from<admin@digvice.kl.com.ua>");
            // if($send){
            //     echo 'OK';
            // }
        }
    }
    // require_once("../../../wp-load.php");
    // if(mail("coolahhy@gmail.com", "hello","hello"))
    // echo "ok ";
    // $address = "coolahhy@gmail.com";
    // $mes = "Mail";
    // $from = "admin@digvice.kl.com.ua";
    // $send = mail ($address, $mes, "Content-type:text/plain; charset = UTF-8\r\nReply-To:$from\r\nFrom:$from<admin@digvice.kl.com.ua>");
    //     if($send){
    //         echo 'mail OK ';
    //         // echo ($address);
    //         // echo ($mes);
    //         // echo ($from);
    //     }
    // $headers = 'From: My Name <coolahhy@gmail.com>' . "\r\n";
    // $success = wp_mail('coolahhy@gmail.com', 'Тема', 'Содержание');
    // echo ($headers);
    //     if(wp_mail('coolahhy@gmail.com', 'Тема', 'Содержание')){
    //         echo 'wp_mail OK ';
    //         echo ($headers);
    //     }

    //     $to = 'coolahhy@gmail.com';
    //     $subject = 'The subject';
    //     $body = 'The email body content';
    //     $headers = array('Content-Type: text/html; charset=UTF-8');
         
    //     $wpmail = wp_mail( $to, $subject, $body, $headers );
    //     if($wpmail){
    //         echo 'wp_mail OK ';
    //     }
    // else echo "error";

    /*<?php echo do_shortcode( '[contact-form-7 id="232" title="Contact form 1"]' ); ?>*/
?>
<?php
    $post = (!empty($_POST)) ? true : false;
    if ($post){
        $tel = htmlspecialchars(trim($_POST['telephone']));
        $error = '';

        if(!$error){
            $address = "coolahhy@gmail.com";
            $mes = "Почта: ".$tel."\n\nИмя: ".$tel."\n\nТема: " .$tel."\n\nСообщение: ".$tel."\n\n";
            // $mes = "Сообщение: ".$tel."\n\n";
            $send = mail ($address, $mes, "Content-type:text/plain; charset = UTF-8");
            if($send){
                echo 'OK';
            }
        }
    }
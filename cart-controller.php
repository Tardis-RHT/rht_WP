<?php
session_start();
// unset($_SESSION['products']);
$product_id = $_POST['id'];
if (!isset($_SESSION['products']) && !empty($product_id)) {
    $_SESSION['products'] = array(
        array(
            'id' => $product_id,
            'count' => 1
        )  
    );
}else {
    // foreach ($_SESSION['products'] as $curproduct){
    //    if(array_search($product_id, $curproduct)){
    //        $curproduct['count']++;
    //        $is_product = true;
    //        print_r($curproduct);
    //    }
    // }

    for($i = 0; $i < sizeof($_SESSION['products']); $i++){
        if(array_search( $product_id, $_SESSION['products'][$i])){
            $_SESSION['products'][$i]['count']++;
            $is_product = true;
        }
    } 
    if ($is_product !== true && !empty($product_id)){
         $new_product = array(
             'id' => $product_id,
             'count' => 1
         );
       array_push($_SESSION['products'], $new_product);
     }
}

function deleteProduct($delete_product_id){
    if(isset($_SESSION['products']) && !empty($id_to_delete)){
        for($j = 0; $j < sizeof($_SESSION['products']); $j++){
            if(array_search( $delete_product_id, $_SESSION['products'][$j])){
                unset($_SESSION['products'][$j]);
            }
        } 
    }
}
$id_to_delete = $_POST['id_to_delete'];
deleteProduct($id_to_delete);

function countItems(){
    if (isset($_SESSION['products'])){
        $count = 0;
        $products = $_SESSION['products'];
        foreach($products as $product ){ 
            $count = $count + $product['count'];
        }
        echo $count;
    } else{
        echo 0;
    }
}
countItems();

?>
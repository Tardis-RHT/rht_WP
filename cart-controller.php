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
}elseif(!empty($product_id)){
    for($i = 0; $i < sizeof($_SESSION['products']); $i++){
        if(in_array( $product_id, $_SESSION['products'][$i])){
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
    for($j = 0; $j < sizeof($_SESSION['products']); $j++){
        if(in_array( $delete_product_id, $_SESSION['products'][$j])){
            unset($_SESSION['products'][$j]);
        }
    } 
}
$id_to_delete = $_POST['id_to_delete'];
if(isset($_SESSION['products']) && !empty($id_to_delete)){
    deleteProduct($id_to_delete);
}

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
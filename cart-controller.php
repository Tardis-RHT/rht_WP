<?php
session_start();
// unset($_SESSION['products']);
$product_id = $_POST['id'];
$products_array = $_SESSION['products'];
if($product_id){
    if(!isset($_SESSION['products'])) {
        $_SESSION['products'] = array(
            $product_id => 1,
        );
    } 
    else{
        if(array_key_exists($product_id, $_SESSION['products'])){
            $_SESSION['products'][$product_id]++;
        } else {
            $_SESSION['products'][$product_id] = 1;
        }
    }
};

$id_to_delete = $_POST['id_to_delete'];
function deleteProduct($delete_product_id){
    if(array_key_exists($delete_product_id, $_SESSION['products'])){
        unset( $_SESSION['products'][$delete_product_id]);
    }
}
if($id_to_delete){
    deleteProduct($id_to_delete);
}

$id_to_change = $_POST['id_to_change'];
$new_quantity = $_POST['new_quantity'];
function changeQuantity($id, $quantity){
    if(array_key_exists($id, $_SESSION['products']) && $quantity > 0){
        $_SESSION['products'][$id] = $quantity;
    } elseif(array_key_exists($id, $_SESSION['products']) && $quantity == 0){
        unset( $_SESSION['products'][$id]);
    }
}
if($id_to_change){
    changeQuantity($id_to_change, $new_quantity);
}


function countItems(){
    if (isset($_SESSION['products'])){
        $count = 0;
        $products = $_SESSION['products'];
        foreach($products as $product => $quantity ){ 
            $count = $count + $quantity;
        }
        echo $count;
    } else{
        echo 0;
    }
}
countItems();

// print_r($_SESSION['products']);
?>
<?php

if(isset($_POST["Item"])){

    $item = $_POST["Item"];
    $qty = $_POST["Quantity"];

    if($item == "S001"){
        $id = "S001";
        $name = "Tablet";
        $price = 12000;
    }
    elseif($item == "S002"){
        $id = "S002";
        $name = "Laptop";
        $price = 27000;
    }
    else{
        $id = "S003";
        $name = "Phone";
        $price = 21000;
    }

    if(isset($_COOKIE['cart'][$id]['qty'])){
        $qty = $_COOKIE['cart'][$id]['qty'] + $qty;
    }

    setcookie("cart[$id][id]", $id, time() + 3600);
    setcookie("cart[$id][name]", $name, time() + 3600);
    setcookie("cart[$id][price]", $price, time() + 3600);
    setcookie("cart[$id][qty]", $qty, time() + 3600);

    header("Location: shoppingcart.php");
    exit();
}

?>
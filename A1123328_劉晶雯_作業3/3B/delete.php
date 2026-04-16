<?php

if(isset($_GET['id'])){

    $id = $_GET['id'];

    setcookie("cart[$id][id]", "", time() - 3600);
    setcookie("cart[$id][name]", "", time() - 3600);
    setcookie("cart[$id][price]", "", time() - 3600);
    setcookie("cart[$id][qty]", "", time() - 3600);
}

header("Location: shoppingcart.php");
exit();
?>
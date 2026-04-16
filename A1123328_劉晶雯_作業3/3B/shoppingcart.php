<?php
session_start();

$cart = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : null;
$total = 0;
?>

<html>
<head>
    <title>Shopping Cart</title>
</head>

<body style="background-color:#B2DFDB;">

<h2 style="text-align:center;">Your Shopping Cart</h2>

<center>

<table border="1" cellpadding="10" bgcolor="white">

<tr>
    <th>Action</th>
    <th>Product ID</th>
    <th>Name</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Total</th>
</tr>

<?php
if($cart){

    foreach($cart as $id => $item){

        $subtotal = $item['price'] * $item['qty'];
        $total += $subtotal;
?>

<tr>
    <td><a href="delete.php?id=<?php echo $id; ?>">Delete</a></td>
    <td><?php echo $item['id']; ?></td>
    <td><?php echo $item['name']; ?></td>
    <td><?php echo $item['price']; ?></td>
    <td><?php echo $item['qty']; ?></td>
    <td><?php echo $subtotal; ?></td>
</tr>

<?php
    }

} else {
?>

<tr>
    <td colspan="6">Cart is empty</td>
</tr>

<?php
}
?>

<tr>
    <td colspan="6" align="right">
        Total Price = <?php echo $total; ?>
    </td>
</tr>

</table>

<br>

<a href="catalog.php">Back to Catalog</a>

</center>

</body>
</html>
<html>
<head>
    <title>Catalog Page</title>
</head>

<body style="background-color:#B2DFDB;">

<h1 style="text-align:center;">Catalog</h1>

<center>

<form action="savecart.php" method="POST">

<table border="1" cellpadding="10" bgcolor="white">

<tr>
    <td>Choose Item</td>
    <td>
        <select name="Item">
            <option value="S001">Tablet - 12000</option>
            <option value="S002">Laptop - 27000</option>
            <option value="S003">Phone - 21000</option>
        </select>
    </td>
</tr>

<tr>
    <td>Quantity</td>
    <td><input type="number" name="Quantity" value="1" min="1"></td>
</tr>

<tr>
    <td colspan="2" align="center">
        <input type="submit" value="Add To Cart">
        <br><br>
        <a href="catalog.php">Product Catalog</a> |
        <a href="shoppingcart.php">View Cart</a>
    </td>
</tr>

</table>

</form>

</center>

</body>
</html>
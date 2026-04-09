<?php

$user = $_POST["uname"];
$pass = $_POST["password"];

if($user == "php" && $pass == "12345"){
    header("Location:form.php");
}else{
    echo "<center>";
    echo "<h4> Login Failed </h4>";
    echo "<a href='login.php'>Try Again</a>";
}

?>
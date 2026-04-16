<?php

session_start();

$sID = "student";
$sPass = "12345";

$aID = "admin";
$aPass = "admin";

$tID = "teacher";
$tPass = "54321";

$userID = $_POST["uname"];
$pass = $_POST["password"];

$date= strtotime("+3 seconds", time());

if($userID==$sID && $pass==$sPass){
    $_SESSION["login"]='Student';
    setcookie("uname",$userID,$date);
    header("Refresh:0;url=student.php");

}elseif($userID==$aID && $pass==$aPass){
    $_SESSION['login']='Admin';
    setcookie("uname",$userID,$date);
    header("Refresh:0;url=admin.php");

}elseif($userID==$tID && $pass==$tPass){
    $_SESSION['login']='Teacher';
    setcookie("uname",$userID,$date);
    header("Refresh:0;url=teacher.php");

}else{
    echo "<center>";
    echo "<h4> Login Failed </h4>";
    echo "<a href='login.php'>Try Again</a>";
}

?>
<?php
session_start();

if(isset($_SESSION["login"])){
    if($_SESSION['login']=='Teacher'){
        echo"<h1> Welcome Teacher! Login Sucess</h1>";
        echo"<a href='logout.php'> Logout </a>";
    }else{
        echo"<h1> Try Again </h1>";
        header("Refresh:3; url= login.php");
    }
}

?>
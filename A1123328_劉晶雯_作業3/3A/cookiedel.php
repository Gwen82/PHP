<?php

setcookie('uname', ' ', time()-100);
header("Refresh:3; url= login.php");

?>
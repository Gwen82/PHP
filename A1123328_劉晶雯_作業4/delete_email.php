<?php

include 'db.php';

if(isset($_GET['id'])){

    $id = intval($_GET['id']);

    $sql =
    "DELETE FROM Email
    WHERE Id = $id";

    mysqli_query(
        $conn,
        $sql
    );

}
mysqli_close($conn);

header(
    "Location:index.php"
);

exit;

?>
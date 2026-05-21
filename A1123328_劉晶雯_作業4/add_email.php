<?php
// Include database connection
include 'db.php';

// Get and sanitize POST input
if (isset($_POST['email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Check that email is not empty
    if (!empty($email)) {
        // SQL query to insert email into email table
        $sql = "INSERT INTO email (email) VALUES ('$email')";
        
        // Execute query
        mysqli_query($conn, $sql);
    }
}

// Redirect back to index.php
header("Location: index.php");
exit();
?>

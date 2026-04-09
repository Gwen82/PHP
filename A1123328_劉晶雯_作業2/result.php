<?php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $program = $_POST["program"];
    $message = $_POST["message"];

    // hobbies (might be empty)
    if(isset($_POST["hobbies"])) {
        $hobbies = $_POST["hobbies"];
    } else {
        $hobbies = [];
    }

} else {
    echo "No data submitted!";
    exit();
}

?>

<html>
<head>
    <title>Registration Result</title>
</head>

<body style="background-color:#E0F7FA;">

<h1>Registration Successful!</h1>
<hr style="border: 1px solid black;">

<p>Name: <?php echo $name; ?></p>
<p>Age: <?php echo $age; ?></p>
<p>Gender: <?php echo $gender; ?></p>
<p>Phone: <?php echo $phone; ?></p>
<p>Email: <?php echo $email; ?></p>
<p>Program: <?php echo $program; ?></p>

<p>Hobbies:
<?php
if (count($hobbies) > 0) {
    echo implode(", ", $hobbies);
} else {
    echo "None";
}
?>
</p>

<p>Message: <?php echo $message; ?></p>

</body>
</html>
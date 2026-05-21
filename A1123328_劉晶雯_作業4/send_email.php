<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $send_mode = $_POST['send_mode'] ?? 'all';
    $random_count = intval($_POST['random_count'] ?? 5);
    $interval = intval($_POST['interval'] ?? 2);

    if ($subject === '' || $message === '') {
        die("Subject & Message required");
    }

    // ===== GET EMAILS =====
    $emails = [];
    $result = mysqli_query($conn, "SELECT email FROM email ORDER BY Id ASC");

    while ($row = mysqli_fetch_assoc($result)) {
        $emails[] = $row['email'];
    }

    if (count($emails) === 0) {
        die("No emails found");
    }

    // ===== FILTER MODE =====
    if ($send_mode === 'random') {
        shuffle($emails);
        $emails = array_slice($emails, 0, min($random_count, count($emails)));
    }

    $total = count($emails);

    echo "<h2>Sending Newsletter...</h2>";
    echo "<div style='font-family:monospace'>";

    // ===== LOOP EMAIL =====
    foreach ($emails as $i => $toEmail) {

        $mail = new PHPMailer(true);

        try {

            // =========================
            // SERVER SETTINGS (YOUR TEMPLATE STYLE)
            // =========================
            $mail->SMTPDebug = SMTP::DEBUG_OFF; // change to DEBUG_SERVER if needed
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'a1123328@mail.nuk.edu.tw';
            $mail->Password   = 'v j s r q h q u a l s c w f l y';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            // =========================
            // SENDER (FROM TEMPLATE STYLE)
            // =========================
            $mail->setFrom('a1123328@mail.nuk.edu.tw', 'Sweet Bean Cafe');

            // =========================
            // RECIPIENT (DYNAMIC)
            // =========================
            $mail->addAddress($toEmail);

            // =========================
            // CONTENT (FROM FORM)
            // =========================
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = nl2br($message);
            $mail->AltBody = strip_tags($message);

            $mail->send();

            $status = "SENT";

        } catch (Exception $e) {
            $status = "FAILED: " . $mail->ErrorInfo;
        }

        $percent = round((($i + 1) / $total) * 100);

        echo "$percent% - $toEmail => $status<br>";
        flush();

        if ($i < $total - 1 && $interval > 0) {
            sleep($interval);
        }
    }

    echo "</div>";
    echo "<h3>DONE</h3>";

    mysqli_close($conn);
    exit;
}

?>

<!-- ================= FORM ================= -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sweet Bean Cafe Newsletter</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:Arial, sans-serif;
            background:#f6f2ec;
            min-height:100vh;
            padding:40px 20px;
        }

        .wrapper{
            max-width:700px;
            margin:auto;
        }

        .nav{
            text-align:center;
            margin-bottom:20px;
        }

        .nav a{
            text-decoration:none;
            color:#8B5A2B;
            font-weight:bold;
            margin:0 10px;
        }

        .nav a:hover{
            text-decoration:underline;
        }

        .card{
            background:white;
            border-radius:18px;
            padding:35px;
            border:1px solid #eee;
            box-shadow:0 8px 25px rgba(0,0,0,.06);
        }

        .logo{
            text-align:center;
            margin-bottom:30px;
        }

        .logo h1{
            color:#8B5A2B;
            margin-bottom:8px;
        }

        .logo p{
            color:#777;
            font-size:14px;
        }

        .section{
            margin-top:20px;
        }

        .section-title{
            color:#8B5A2B;
            font-weight:bold;
            margin-bottom:10px;
        }

        input[type=text],
        input[type=number],
        textarea{

            width:100%;

            padding:14px;

            border:1px solid #ddd;

            border-radius:12px;

            background:#fafafa;

            transition:.2s;
        }

        textarea{
            resize:none;
        }

        input:focus,
        textarea:focus{

            outline:none;

            border-color:#8B5A2B;

            background:white;
        }

        .radio-group{

            display:flex;

            gap:30px;

            padding:14px;

            background:#fafafa;

            border-radius:12px;
        }

        .radio-group label{

            display:flex;

            align-items:center;

            gap:8px;

            cursor:pointer;
        }

        .small-input{
            max-width:180px;
        }

        #randomBox{
            display:none;
            margin-top:15px;
        }

        button{

            width:100%;

            margin-top:25px;

            padding:15px;

            border:none;

            border-radius:12px;

            background:#8B5A2B;

            color:white;

            font-size:16px;

            font-weight:bold;

            cursor:pointer;

            transition:.2s;
        }

        button:hover{

            background:#704723;

            transform:translateY(-2px);
        }

    </style>

    <script>

        function toggleRandom(){

            const random =
            document.getElementById("random");

            const box =
            document.getElementById("randomBox");

            box.style.display =
                random.checked
                ? "block"
                : "none";

        }

    </script>

</head>

<body onload="toggleRandom()">

<div class="wrapper">

    <!-- NAVIGATION -->

    <div class="nav">
        <a href="index.php">
            Subscription Page
        </a>

        |

        <a href="send_email.php">
            Send Newsletter
        </a>
    </div>


    <!-- MAIN CARD -->
    <div class="card">
        <div class="logo">
            <h1>
                ☕ Sweet Bean Cafe
            </h1>

            <p>
                Send promotions and menu updates
            </p>
        </div>

        <form method="POST">
            <!-- SUBJECT -->
            <div class="section">
                <div class="section-title">

                    Newsletter Subject

                </div>

                <input
                    type="text"
                    name="subject"
                    placeholder="Special Promotion: Free Cookie"
                    required>
            </div>

            <!-- MESSAGE -->
            <div class="section">
                <div class="section-title">

                    Message

                </div>
                
                <textarea
                    name="message"
                    rows="8"
                    placeholder="Write your newsletter here..."
                    required></textarea>
            </div>

            <!-- SEND MODE -->
            <div class="section">
                <div class="section-title">
                    Send Mode
                </div>

                <div class="radio-group">
                    <label>
                        <input
                            type="radio"
                            name="send_mode"
                            value="all"
                            checked
                            onclick="toggleRandom()">
                        Send All
                    </label>

                    <label>
                        <input
                            type="radio"
                            id="random"
                            name="send_mode"
                            value="random"
                            onclick="toggleRandom()">
                        Random Send
                    </label>
                </div>
            </div>


            <!-- RANDOM COUNT -->
            <div id="randomBox">
                <div class="section">
                    <div class="section-title">

                        Number of Recipients

                    </div>
                    <input
                        class="small-input"
                        type="number"
                        name="random_count"
                        value="5"
                        min="1">
                </div>
            </div>

            <!-- INTERVAL -->
            <div class="section">
                <div class="section-title">

                    Interval (seconds)

                </div>

                <input
                    class="small-input"
                    type="number"
                    name="interval"
                    value="2"
                    min="0">
            </div>

            <!-- BUTTON -->
            <button type="submit">
                Send Newsletter
            </button>
        </form>
    </div>
</div>

</body>
</html>
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
            margin-top:25px;
        }

        .section-title{
            color:#8B5A2B;
            font-weight:bold;
            margin-bottom:10px;
        }

        input[type=email]{
            width:100%;
            padding:14px;
            border:1px solid #ddd;
            border-radius:12px;
            background:#fafafa;
            transition:.2s;
        }

        input[type=email]:focus{
            outline:none;
            border-color:#8B5A2B;
            background:white;
        }

        input[type=submit]{
            width:100%;
            margin-top:15px;
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

        input[type=submit]:hover{
            background:#704723;
            transform:translateY(-2px);
        }

        .subscriber-box{
            background:#fafafa;
            border:1px solid #eee;
            border-radius:12px;
            padding:18px;
            max-height:250px;
            overflow-y:auto;
        }

        .subscriber{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:10px;
            border-bottom:1px solid #eee;
        }

        .delete-btn{
            text-decoration:none;
            background:#999999;
            color: white;
            padding:5px 10px;
            border-radius:8px;
            font-size: 12px;
        }

        .delete-btn:hover{
            background:#c9302c;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="nav">
        <a href="index.php">Subscription Page</a> |
        <a href="send_email.php">Send Newsletter</a>
    </div>

    <div class="card">
        <div class="logo">
            <h1>☕ Sweet Bean Cafe</h1>
            <p>Get updates about new menu items and promotions</p>
        </div>

        <div class="section">
            <div class="section-title">
                Subscribe Newsletter
            </div>

            <form action="add_email.php" method="POST">

                <input 
                    type="email"
                    name="email"
                    required
                    placeholder="Enter your email address">

                <input 
                    type="submit"
                    value="Subscribe">
            </form>
        </div>

        <div class="section">

            <div class="section-title">
                Subscriber List
            </div>

            <div class="subscriber-box">

                <?php
                include 'db.php';

                $sql = "SELECT * FROM email ORDER BY Id ASC";
                $result = mysqli_query($conn,$sql);

                if($result && mysqli_num_rows($result)>0){

                    while($row = mysqli_fetch_assoc($result)){

                        echo "<div class='subscriber'>";
                        echo htmlspecialchars($row['Id']);
                        echo " • ";
                        echo htmlspecialchars($row['Email']);
                        echo "<a href='delete_email.php?id=".$row['Id']."'onclick='return confirm(\"Delete this subscriber?\")'class='delete-btn'> 
                        🗑️Delete
                        </a>";
                        echo "</div>";
                    }
                } else {
                    echo "No subscribers yet.";
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
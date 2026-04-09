<html>
    <head>
       <title>Login Page</title> 
    </head>

    <body>
        <body style ="background-color: #B2DFDB;">
        <h1><p style="text-align: center;">🏕️Welcome to 2026 SummerCamp Event!!🏕️</p></h1>
        <h2><p style="text-align: center;">Come and join us to have fun this summer!!</p></h2>
        <hr style="border: 1px solid black;">

        <center>
            <font size=6>Login Here!</font>
            <br style="margin-top:10px">

            <FORM action="logincheck.php" method= "POST">
                <table border="8" cellpadding="30" bgcolor="white">    
                    <td>Username : </td>
                    <td><input type="text" name="uname"></td>

                    <tr>
                        <td>Password : </td>
                        <td><input type="password" name="password"></td>
                    </tr>

                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Login">
                            <input type="reset" value="Forget Password">
                        </td>
                    </tr>
                </table>
            </FORM>
        </center>
    </body>
</html>
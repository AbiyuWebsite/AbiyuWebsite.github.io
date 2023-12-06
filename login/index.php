<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portifolio</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .err {
            color: red;
            font-style: italic;
        }
    </style>
    <?php
    include("login.php");
    ?>
</head>

<body>

    <div class="contact">
        <form action="" method="post">
            <?php
            $time = microtime();
            $_POST['timechecking'] = $time;
            ?>
            <table>
                <tr>
                    <td></td>
                    <td><input type="hidden" name="timechecking" value="" <?php echo $time; ?>></td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td><input type="text" name="user"></td>
                    <td><span class="err"><?php echo $userErr; ?></span></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="pass"></td>
                    <td><span class="err"><?php echo $passErr; ?></span></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" value="Login" name="login"></td>
                </tr>
            </table>
        </form>
        <br>
        Have an Account <a href="../contact.php">...Signup...</a>

    </div>

</body>

</html>
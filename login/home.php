<?php
session_start();
if (isset($_SESSION["user"])) {
    echo "<h1 style ='color:green; text-align:center'>Welcome to" . ' ' . $_SESSION['user'] . "</h1>";
    echo "<a href='index.php' style=float:right>Logout</a>";
} else {
    header("location:index.php");
}

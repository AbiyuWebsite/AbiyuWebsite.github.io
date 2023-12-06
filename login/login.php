<?php
$userErr = $passErr = "";
if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if (empty($_POST['user']) && empty($_POST['pass'])) {
        echo 'username and password is required';
    }
    if (!empty($_POST['user']) && !empty($_POST['pass'])) {
        login_user($user, $pass);
    }
}
function connect()
{
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'contactdb';
    try {
        $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "login error" . $e->getMessage();
    }
}
function login_user($user, $pass)
{
    $conn = connect();
    $select = "SELECT *FROM student";
    $result = $conn->query($select);
    /* if($row=$result->num_rows>0)
    {
        $userfound=false;
      }*/
    try {
        $stmt = $conn->prepare($select);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($row["username"] == $user && $row["password"] == $pass) {
                /* $userfound=true;*/
                $_SESSION["user"] = $user;
                header("location:home.php");
            }
        }
    } catch (PDOException $e) {
        echo "login error" . $e->getMessage();
    }
}

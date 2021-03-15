<?php
include_once("conn.php");
session_start();

$fname = $_REQUEST["fname"];
$lname = $_REQUEST["lname"];
$cnum = $_REQUEST["cnum"];
$brgy = strtolower($_REQUEST["brgy"]);
$dist = strtolower($_REQUEST["dist"]);
$city = strtolower($_REQUEST["city"]);
$uname = $_REQUEST["uname"];
$pass = md5($_REQUEST["pass"]);

$checkUname = mysqli_query($con, "SELECT * FROM users WHERE uname = '$uname'");
if (mysqli_num_rows($checkUname) == 0) {
    $in = mysqli_query($con, "INSERT INTO users VALUES(NULL, '$fname','$lname','$brgy','$dist','$city', $cnum, '$uname','$pass')");
    if ($in) {
        $_SESSION['id'] = mysqli_insert_id($con);
        echo '
        <script>
        alert("Welcome ' . $uname . '.")
        window.location.href = "../user/news.php"
        </script>
    ';
    }
} else {
    echo '
        <script>
        alert("Username ' . $uname . ' already exist.\nPlease try again")
        window.location.href = "../user/register.php"
        </script>
    ';
}

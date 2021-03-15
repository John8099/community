<?php
include_once("conn.php");
session_start();

if (isset($_GET["profile"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $brgy = $_POST["brgy"];
    $dist = $_POST["dist"];
    $city = $_POST["city"];
    $cnum = $_POST["cnum"];
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];

    $checkUname = mysqli_query($con, "SELECT * FROM users WHERE uname = '$uname' and id != $_SESSION[id]");

    if (mysqli_num_rows($checkUname) == 0) {
        $query;
        if ($pass == "") {
            $query = mysqli_query($con, "UPDATE users set fname='$fname', lname='$lname', contact_number='$cnum', brgy='$brgy', district='$dist', city='$city', uname='$uname' WHERE id=$_SESSION[id]");
        } else {
            $pass = md5($_POST["pass"]);
            $query = mysqli_query($con, "UPDATE users set fname='$fname', lname='$lname', contact_number='$cnum', brgy='$brgy', district='$dist', city='$city', uname='$uname', pass='$pass' WHERE id=$_SESSION[id]");
        }

        if ($query) {
            echo "
            <script>
                alert('Profile successfully updated.')
                window.location.href = '../user/my-profile.php'
            </script>
        ";
        }
    } else {
        echo '
            <script>
            alert("Username ' . $uname . ' already exist.\nPlease try again")
            window.location.href = "../user/my-profile.php"
            </script>
        ';
    }
}
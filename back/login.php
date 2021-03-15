<?php
include "conn.php";
session_start();

$uname = $_POST["uname"];
$password = md5($_POST["password"]);

$query = mysqli_query($con, "SELECT * FROM users WHERE uname = '$uname'");

if (mysqli_num_rows($query) > 0) {
    $users = mysqli_fetch_array($query);

    if ($users["pass"] == $password) {
        $_SESSION['id'] = $users["id"];
        echo "
            <script>
                alert('Welcome $users[fname], $users[lname]')
                window.location.href = '../user/news.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Error password.')
                window.location.href = '../'
            </script>
        ";
    }
} else {
    echo "
    <script>
        alert('Error username.')
        window.location.href = '../'
    </script>
";
}

<?php
include_once("../back/conn.php");
session_start();
if (!isset($_SESSION['id'])) {
    header("location: ../");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Profile</title>
    <link rel="stylesheet" href="../dep/bootstrap.min.css">
    <link rel="stylesheet" href="../dep/style.css">
    <script src="../dep/jquery.min.js"></script>
    <script src="../dep/bootstrap.min.js"></script>
</head>

<body>
    <?php include_once("user-nav.php") ?>
    <div class="container" id="con">
        <div class="jumbotron" style="width: 500px; margin:auto; ">
            <?php
            $query = mysqli_query($con, "SELECT * FROM users WHERE id = $_SESSION[id]");
            $users = mysqli_fetch_array($query);
            ?>
            <form action="../back/edit.php?profile" method="POST">
                <h2 class="text-center">My Profile</h2>
                <div class="form-group">
                    <label>First name</label>
                    <input type="text" class="form-control" name="fname" value="<?= $users["fname"] ?>" placeholder="Enter first name" required>
                </div>
                <div class="form-group">
                    <label>Last name</label>
                    <input type="text" class="form-control" name="lname" value="<?= $users["lname"] ?>" placeholder="Enter last name" required>
                </div>

                <div class="form-group">
                    <label>Barangay</label>
                    <input type="text" class="form-control" name="brgy" value="<?= $users["brgy"] ?>" placeholder="Enter baranger" required>
                </div>

                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" class="form-control" value="<?= $users["contact_number"] ?>" name="cnum" placeholder="Enter contact number" required>
                </div>

                <div class="form-group">
                    <label>District</label>
                    <input type="text" class="form-control" name="dist" value="<?= $users["district"] ?>" placeholder="Enter district (e.g. Jaro, Arevalo)" required>
                </div>

                <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="city" value="<?= $users["city"] ?>" placeholder="Enter city" required>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="uname" value="<?= $users["uname"] ?>" placeholder="Enter username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                    <button type="button" class="btn btn-danger btn-block" onclick="return(window.location.href='news.php')">Cancel</button>
                </div>
                <div class="clearfix">
                    <label class="float-left form-check-label" style="font-weight: normal;"><input type="checkbox" id="showPass"> Show password</label>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="../dep/main.js"></script>

</html>
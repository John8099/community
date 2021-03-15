<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="../dep/bootstrap.min.css">
    <link rel="stylesheet" href="../dep/style.css">
    <script src="../dep/jquery.min.js"></script>
    <script src="../dep/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="jumbotron" style="width: 500px; margin-top: 20px !important; margin:auto; ">
            <form action="../back/register.php" method="POST">
                <h2 class="text-center">Registration</h2>
                <div class="form-group">
                    <label>First name</label>
                    <input type="text" class="form-control" name="fname" placeholder="Enter first name" required>
                </div>
                <div class="form-group">
                    <label>Last name</label>
                    <input type="text" class="form-control" name="lname" placeholder="Enter last name" required>
                </div>

                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" class="form-control" name="cnum" placeholder="Enter contact number" required>
                </div>

                <div class="form-group">
                    <label>Barangay</label>
                    <input type="text" class="form-control" name="brgy" placeholder="Enter baranger" required>
                </div>

                <div class="form-group">
                    <label>District</label>
                    <input type="text" class="form-control" name="dist" placeholder="Enter district (e.g. Jaro, Arevalo)" required>
                </div>

                <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="city" placeholder="Enter city" required>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="uname" placeholder="Enter username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
                <div class="clearfix">
                    <label class="float-left form-check-label" style="font-weight: normal;"><input type="checkbox" id="showPass"> Show password</label>
                </div>
            </form>
            <hr>
            <div style="text-align: center;">
                Already registered? <a href="../index.php">Login here</a>
            </div>
        </div>
    </div>
</body>
<script src="../dep/main.js"></script>

</html>
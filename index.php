<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="dep/bootstrap.min.css">
    <link rel="stylesheet" href="dep/style.css">
    <script src="dep/jquery.min.js"></script>
    <script src="dep/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="jumbotron" id="jum" style="width: 500px; margin:auto;">
            <form action="back/login.php" method="POST">
                <h2 class="text-center">Log in</h2>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="uname" placeholder="Enter username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="pass" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Log in</button>
                </div>
                <div class="clearfix">
                    <label class="float-left form-check-label" style="font-weight: normal;"><input type="checkbox" id="showPass"> Show password</label>
                </div>
            </form>
            <hr>
            <div style="text-align: center;">
                <a href="user/register.php">Create an Account</a>
            </div>
        </div>
    </div>
</body>
<script src="dep/main.js"></script>

</html>
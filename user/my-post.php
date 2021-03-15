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
    <title>My Posts</title>
    <link rel="stylesheet" href="../dep/bootstrap.min.css">
    <link rel="stylesheet" href="../dep/style.css">
    <script src="../dep/jquery.min.js"></script>
    <script src="../dep/bootstrap.min.js"></script>
    <script src="../dep/main.js"></script>
</head>

<body>
    <?php include_once("user-nav.php") ?>
    <!-- Navigation Bar -->
    <div class="container" id="con">
        <div class="jumbotron" style="padding: 15px;">
            <div class="row" style="padding: 10px;">
                <?php
                $users = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id='$_SESSION[id]'"));
                $query = mysqli_query($con, "SELECT * FROM news n LEFT JOIN users u on n.post_by = u.id WHERE n.post_by=$_SESSION[id]");
                while ($row = mysqli_fetch_array($query)) :
                ?>
                    <div class="thumbnail">
                        <?php
                        if ($row["img_location"] != "" && file_exists("../post_images/$row[img_location]")) {
                        ?>
                            <img src="../post_images/<?= $row["img_location"] ?>" style="width: 100%;">
                        <?php
                        }
                        ?>
                        <div class="caption">
                            <small>
                                <?= date("M d, Y h:i:s A", strtotime(str_replace('-', '/', $row["postDate"]))) ?>
                            </small>
                            <p>
                                <?= strtoupper($row["happen"]) . " at " . strtoupper("brgy. $row[brgy] $row[district], $row[city]") ?>
                            </p>
                            <p>
                                <a href="../back/delete.php?post_id=<?= $row["news_id"] ?>" class="btn btn-danger" role="button">Remove</a>
                            </p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

</body>

</html>
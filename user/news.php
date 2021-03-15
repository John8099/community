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
    <title>News</title>
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
            <button type="button" data-toggle="modal" data-target="#writePostModal" class="btn btn-primary" style="text-align: center;width: 100%; font-size: 20px"> Write whats happening on your area</button>

            <!-- Modal -->
            <div class="modal fade" id="writePostModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" style="text-align: center;">Write whats happening</h4>
                        </div>
                        <form action="../back/post-news.php" id="formSubmit" method="POST" style="padding: 30px;" enctype="multipart/form-data">
                            <div class="modal-body">
                                <center>
                                    <img src="../img/150x150.png" id="img" style="height: 170px;width: 150px;height: 150px;margin-top:10px;" />
                                    <br>
                                    <input type="file" name="pic" id="profile-img" accept="image/*" capture="camera">
                                </center>

                                <div class="form-group">
                                    <input type="checkbox" id="checkDist" name="isCheck" value="true">
                                    <label>In my district</label>
                                </div>
                                <div id="address">
                                    <div class="form-group">
                                        <label>Barangay</label>
                                        <input type="text" class="form-control" id="inputBrgy" name="brgy" placeholder="Enter baranger">
                                    </div>

                                    <div class="form-group">
                                        <label>District</label>
                                        <input type="text" class="form-control" id="inputDist" name="dist" placeholder="Enter district (e.g. Jaro, Arevalo)">
                                    </div>

                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" id="inputCity" name="city" placeholder="Enter city">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Happening</label>
                                    <input type="text" class="form-control" name="happen" placeholder="Enter happening" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="btnPost" class="btn btn-primary">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="jumbotron" style="padding: 15px;">
            <div class="row" style="padding: 10px;">
                <?php
                $users = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id='$_SESSION[id]'"));
                $query = mysqli_query($con, "SELECT * FROM news n LEFT JOIN users u on n.post_by = u.id WHERE n.news_district='$users[district]' or n.news_brgy='$users[brgy]'");
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
                            <h4>Posted by &#9654; <?= strtoupper("$row[fname] $row[lname]") ?></h4>
                            <small>
                                <?= date("M d, Y h:i:s A", strtotime(str_replace('-', '/', $row["postDate"]))) ?>
                            </small>
                            <p>
                                <?= strtoupper($row["happen"]) . " at " . strtoupper("brgy. $row[brgy] $row[district], $row[city]") ?>
                            </p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

</body>

</html>
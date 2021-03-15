<?php
include_once("conn.php");
session_start();

$post_id = $_GET["post_id"];

$getImg = mysqli_query($con, "SELECT * FROM news WHERE news_id='$post_id'");

if ($getImg) {
    $imgLocation = mysqli_fetch_array($getImg)["img_location"];
    $delete;
    if (unlink("../post_images/$imgLocation")) {
        $delete = mysqli_query($con, "DELETE FROM news WHERE news_id='$post_id'");

        if ($delete) {
            echo "
                <script>
                    alert('Post deleted.')
                    window.location.href = '../user/my-post.php'
                </script>
            ";
        }
    }
}

<?php
include_once("conn.php");
include_once("sms.php");
session_start();


$get_images = $_FILES['pic']['tmp_name'];
$brgy = !isset($_POST["brgy"]) ? "" : $_POST["brgy"];
$dist = !isset($_POST["dist"]) ? "" : $_POST["dist"];
$city = !isset($_POST["city"]) ? "" : $_POST["city"];
$happen = $_POST["happen"];
$uploads_dir = "../post_images";
$insert;
$image_name;

if (isset($_POST["isCheck"])) {
    $getAdd = mysqli_query($con, "SELECT * FROM users WHERE id = $_SESSION[id]");
    $address = mysqli_fetch_array($getAdd);

    $brgy = $address["brgy"];
    $dist = $address["district"];
    $city = $address["city"];
}

if ($get_images == "") {
    $insert = mysqli_query($con, "INSERT INTO news(news_brgy, news_district, news_city, happen, post_by) VALUES('$brgy', '$dist', '$city', '$happen', '$_SESSION[id]')");
} else {
    $upload_image = json_decode(moveImage($_FILES, $uploads_dir));
    $image_name = $upload_image->image_name;

    $insert = mysqli_query($con, "INSERT INTO news(news_brgy, news_district, news_city, happen, post_by, img_location) VALUES('$brgy', '$dist', '$city', '$happen', '$_SESSION[id]', '$image_name')");
}

if ($insert) {
    $message = "Community alert reminder. There is $happen at $brgy $dist, $city";
    $getContacts = mysqli_query($con, "SELECT * FROM users WHERE brgy = '$brgy' and district = '$dist' and city = '$city'");

    while ($row = mysqli_fetch_array($getContacts)) {
        $number = $row["contact_number"];
        itexmo($number, $message);
    }
    echo "
        <script>
            alert('Successfully posted.')
            window.location.href = '../user/news.php'
        </script>
    ";
} else {
    if ($get_images != "") {
        unlink("$uploads_dir/$image_name");
    }
    echo "
        <script>
            alert('Error posting. Please try again')
            window.location.href = '../user/news.php'
        </script>
    ";
}

function moveImage($images, $uploads_dir)
{
    $tmp_name =  $images["pic"]["tmp_name"];
    $name = uniqid() . "_" . basename($images["pic"]["name"]);

    $arr = array(
        "success" => "",
        "image_name" => ""
    );

    if (move_uploaded_file($tmp_name, "$uploads_dir/$name")) {
        $arr["success"] = "true";
        $arr["image_name"] = $name;
    } else {
        $arr["success"] = "true";
    }

    return json_encode($arr);
}

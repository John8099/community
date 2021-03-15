<nav class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#resNav">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <img src="../img/comm-alarm.png" alt="Community Alert image" style="width: 50px;float:left" id="img">
        <a href="#" class="navbar-brand">
            Community Alert
            <?php
            $splitedLink = explode("/", $_SERVER['REQUEST_URI']);
            $currLink = $splitedLink[count($splitedLink) - 1];
            $array = array(
                " &#8226; News on my address" => "news.php",
                " &#8226; My Posts" => "my-post.php",
                " &#8226; All News" => "all-news.php"
            );

            foreach ($array as $title => $link) {
                if ($link == $currLink) {
                    echo "<small style='color:black'>$title</small>";
                }
            }
            ?>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="resNav">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="news.php">News</a></li>
            <li><a href="all-news.php">All News</a></li>
            <li><a href="my-post.php">My Posts</a></li>
            <li><a href="my-profile.php">Profile</a></li>
            <li><a href="../back/logout.php" style="color:red">Logout</a></li>
        </ul>
    </div>
</nav>
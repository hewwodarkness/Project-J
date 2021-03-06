<?php
        require 'db.php';
    include("menu.php");
    include 'goodconnection.php';
    $id = $_GET['id'];

    $sql_select4 =  "SELECT *
                    FROM users
                    WHERE id ='$id'
                    ";

    $result4 = mysqli_query($conn, $sql_select4);
    $row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);


    $sql_select =  "SELECT *
                    FROM post p
                    WHERE p.user_id ='$id'
                    ORDER BY p.dateCreated DESC
                    ";
    $result = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/user_profile.css">
    <title>User Page</title>
</head>
<body>

    <div class="intro">

<div></div>
<div></div>
<div class="main1">
    <?php
        include 'div_posts.php';
    ?>

    <div class="right-block">
        <div class="right-block-tags">
                <img class="user-info-img" src="uploads/<?php if ( $row4['avatar'] != NULL) :
                    echo $row4['avatar'];
                else :
                    echo "uploads/avatar-guest.png";
                endif;
                ?>" alt="">
                <p class="user-info-name">
                    <?=$row4['full_name']?>
                </p>
                <p class="user-info-link">
                    u/userlink
                </p>
        </div>
    </div>


</div>


</div>



</div>
</body>
</html>
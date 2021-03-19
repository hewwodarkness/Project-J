<?php
    require 'db.php';
    include 'menu.php';
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

    // $sql_select7 =  "SELECT distinct *
    //                 FROM tags_medals t
    //                 INNER JOIN users_medals u
    //                 ON t.user_id = '$id'
    //                 WHERE t.medal_id = u.medal_id
    //                 ";
    $sql_select7 =  "SELECT *
                     FROM users_medals u
                     INNER JOIN tags_medals t
                     ON u.user_id = '$id'
                     WHERE u.medal_id = t.medal_id
    ";
    $result7 = mysqli_query($conn, $sql_select7);
    $row7 = mysqli_fetch_all($result7, MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/tag_page.css">
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
                    echo "avatar-guest.png";
                endif;
                ?>" alt="">
                <p class="user-info-name">
                    <?=$row4['full_name']?>
                </p>
                <p class="user-info-link">
                    u/userlink
                </p>
        </div>
        <div class="right-block-avaiable-medals">
            <p>
                Medals user have:
            </p>

            <div class="right-block-avaiable-medals-list">
                <?php foreach($row7 as $row7): ?>
                    <a href="medal_page.php?medal_id=<?=$row7['medal_id']?>">
                        <div class="right-block-avaiable-medals-each">

                            <div>

                                <img class="user-pfp"
                                    src="
                                        <?=$row7['medal_avatar']?>
                                    ">
                            </div>

                            <div class="right-block-avaiable-medals-each-name">
                                <?=$row7['medal_name']?>
                            </div>


                        </div>
                    </a>
                <?php endforeach; ?>

            </div>

        </div>
    </div>


</div>


</div>



</div>
</body>
</html>
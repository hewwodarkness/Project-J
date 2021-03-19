<?php
require 'db.php';
include("menu.php");
include 'goodconnection.php';
    $id = $_GET['medal_id'];
    $id1 = $_GET['medal_id'];
//
//
//
    $sql_select4 =  "SELECT distinct tag_id, tag_name, tag_description, tag_picture
                    FROM tags
                    WHERE tag_id ='$id'
                    ";

    $result4 = mysqli_query($conn, $sql_select4);
    $row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);
//
//
//
    $sql_select99 =    "SELECT distinct u.id, u.full_name, u.avatar, t.dateJoined
                        From users u
                        INNER JOIN tags_moderators t
                        ON u.id = t.user_id
                        WHERE tag_id ='$id'
                        ";

    $result99 = mysqli_query($conn, $sql_select99);

    if (!$result99) {
        die('Invalid query: ' . mysqli_error($conn));
    }

    $row99 = mysqli_fetch_all($result99, MYSQLI_ASSOC);


    //
    //
    //

    $sql_select98 =    "SELECT distinct u.medal_id, u.medal_name, u.medal_avatar
                        From tags_medals u
                        INNER JOIN tags t
                        ON u.tag_id = t.tag_id
                        WHERE u.tag_id ='$id'
                        ";

    $result98 = mysqli_query($conn, $sql_select98);

    if (!$result98) {
        die('Invalid query: ' . mysqli_error($conn));
    }

    $row98 = mysqli_fetch_all($result98, MYSQLI_ASSOC);

//
//
//
    $sql_select =  "SELECT distinct p.post_id, p.user_id, p.text, p.image, p.dateCreated, p.comment_id
                    FROM post p
                    INNER JOIN post_tags t
                    ON p.post_id = t.post_id
                    INNER JOIN tags m
                    ON t.tag_id = '$id'
                    order by dateCreated DESC
                    ";


    $result = mysqli_query($conn, $sql_select);

    if (!$result) {
        die('Invalid query: ' . mysqli_error($conn));
    }

    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

// // // // // // 
// // // // // // 
// // // // // // 

    $sql_select12 =  "SELECT COUNT(*) as count FROM tags_followers WHERE tag_id = '$id'";

    $result12 = mysqli_query($conn, $sql_select12);

    if (!$result12) {
        die('Invalid query: ' . mysqli_error($conn));
    }

    $row12 = mysqli_fetch_array($result12, MYSQLI_ASSOC);

// // // // // // 
// // // // // // 
// // // // // // 

    $sql_select13 =  "SELECT COUNT(*) as count FROM post_tags WHERE tag_id = '$id'";

    $result13 = mysqli_query($conn, $sql_select13);

    if (!$result13) {
        die('Invalid query: ' . mysqli_error($conn));
    }

    $row13 = mysqli_fetch_array($result13, MYSQLI_ASSOC);


    $db_query15 = "UPDATE tags SET `tag_count_visit` = `tag_count_visit` + 1 WHERE tag_id = '$id'";

    mysqli_query($conn, $db_query15);



    
    $sql_select678 =  "SELECT distinct medal_avatar, medal_name
                        FROM tags_medals
                        WHERE medal_id ='$id1'
                        ";

    $result678 = mysqli_query($conn, $sql_select678);
    $row6788 = mysqli_fetch_array($result678, MYSQLI_ASSOC);


    $sql_select136 =  "SELECT COUNT(*) as count FROM users_medals WHERE medal_id = '$id1'";

    $result136 = mysqli_query($conn, $sql_select136); 
    $row136 = mysqli_fetch_array($result136, MYSQLI_ASSOC);


    
    $sql_select6781 =  "SELECT distinct m.user_id, u.full_name, u.avatar, u.dateRegister
                        FROM users_medals m
                        INNER JOIN users u 
                        ON m.medal_id = '$id1'
                        WHERE m.user_id = u.id
                        ";

    $result6781 = mysqli_query($conn, $sql_select6781);

    if (!$result6781) {
        die('Invalid query: ' . mysqli_error($conn));
    }
    
    $row6781 = mysqli_fetch_all($result6781, MYSQLI_ASSOC);

//
//
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/tag_page.css">
    <link rel="stylesheet" href="css/medal_page.css">
    <link rel="stylesheet" href="css/user_profile.css">
    <title>User Page</title>
</head>
<body>

<div class="intro">

    <div></div>
    <div class="tag-information">

        <div class="tag-information-top">

            <div class="tag-information-top-pfp-edit">
                <img class="tag-information-image" src="<?=$row6788['medal_avatar']?>" alt="">

            </div>

<!--  -->
<!-- nlf means name, link and followers -->
<!--  -->

        <div class="tag-information-nlf">

            <div class="tag-information-name">
                <?=$row6788['medal_name']?>
            </div>

            <p class="tag-information-description">
              Just a regular medal
            </p>
            <div class="tag-information-bottom">

                <div class="tag-information-bottom-info">
                    Users have this medal: <?=$row136['count']?>
                </div>

            </div>
        </div>

    </div>

    <div class="tag-information-text">


    </div>

</div>
<div class="main1">
<div>
    <?php foreach($row6781 as $row6781): ?>
        <div class="posts12">
            <img class="user-pfp"
            src="uploads/<?php
                                if ( $row6781['avatar'] != NULL) :
                                    echo $row6781['avatar'];
                                else :
                                    echo "avatar-guest.png";
                                endif;
                ?>">
                <p class="pp">
                    <?php echo $row6781['full_name']; ?>
                </p>
                <p class="pp">
                    <?php echo $row6781['dateRegister']; ?>
                </p>
       </div>
    <?php endforeach; ?>
</div>
    

    <div class="right-block">
        <div class="right-block-tags">
            
                <img class="user-info-img" src="<?=$row6788['medal_avatar']?>" alt="">
                <p class="user-info-name">
                    <?=$row6788['medal_name']?>
                </p>
                <p class="user-info-link">
                    Just a regular medal
                </p>
        </div>
    </div>


</div>


</div>



</div>
</body>
</html>
<?php
require 'db.php';
include("menu.php");
include 'goodconnection.php';
    $id = $_GET['tag_id'];
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

    // $post_id1 = mysqli_query($conn, $sql_select)->fetch_assoc()['post_id'];
    // echo $post_id1;

    // $sql_select7 = "SELECT distinct *
    //                 from users u
    //                 INNER JOIN post s
    //                 WHERE s.post_id = '$post_id1'
    //                 ";

    // $result7 = mysqli_query($conn, $sql_select7);
    // $row7 = mysqli_fetch_all($result7, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/user_profile.css">
    <link rel="stylesheet" href="css/tag_page.css">

    <title>Tag Page</title>
</head>
<body>
   
    <div class="intro">

<div></div>

<div class="tag-information">

    <div class="tag-information-top">

        <div class="tag-information-top-pfp-edit">
            <img class="tag-information-image" src="uploads/<?php if ($row4['tag_picture'] != NULL) :
                        echo $row4['tag_picture'];
                    else :
                        echo "avatar-guest.png";
                    endif;?>" alt="">
                    <?php global $edittagpfp;
                        $edittagpfp = $id; ?>
                    <?php if (isset($_SESSION['user'])): ?>
                            <?php if ($_SESSION['user1']['id'] == 2): ?>

                    <form action="actionTagEditPicture.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="a2" value="<?php echo $edittagpfp ?>"/>
                        <!-- <div class="tag-information-top-pfp-edit-button" id="yourBtn" onclick="getFile()">
                            test
                        </div>
                        <div style='height: 0px;width: 0px; overflow:hidden;'>
                            <input id="upfile" type="file" value="upload" onchange="sub(this)" />
                        </div> -->
                       
                        <!-- <input type="submit" value='submit' > -->

                        <input type="file" name="file">
                        <button class="tag-information-top-pfp-edit-button" type="submit">
                            <p>
                                x
                            </p>
                        </button>
                    </form>
                    <? else: ?>

<?php endif; ?>
<?php endif; ?>
            
                    
            
        </div>

<!--  -->
<!-- nlf means name, link and followers -->
<!--  -->

        <div class="tag-information-nlf">

            <div class="tag-information-name">
                <?=$row4['tag_name']?>
            </div>

            <p class="tag-information-description">
                <?php if ($row4['tag_description'] != NULL) :
                        echo $row4['tag_description'];
                    else :
                        echo "Just a regular tag";
                    endif;?>

                
            </p>
            <div class="tag-information-bottom">

                <div class="tag-information-bottom-info">
                    Followers: <?=$row12['count']?>
                </div>

                <div class="tag-information-bottom-info">
                    Posts: <?=$row13['count']?>
                </div>

                <!-- <div class="tag-information-bottom-info">
                    Followers: <?=$row12['count']?>
                </div> -->
            </div>
        </div>

    </div>

    <div class="tag-information-text">


    </div>

</div>

<div class="main1">

    <?php
        include 'div_posts.php';
    ?>

    <div class="right-block">
        <div class="right-block-tags">
                <img class="user-info-img" src="uploads/tenor.gif" alt="">
                <p class="user-info-name">
                    <?=$row4['tag_name']?>
                </p>
                <p class="user-info-link">
                    u/userlink
                </p>
        </div>
        <div class="right-block-moderators">

            <p class="right-block-moderators-name">
                Moderators:
            </p>

            <div class="right-block-moderators-list">
                <?php foreach($row99 as $row99): ?>
                    <div class="right-block-moderators-each">


                            <img class="right-block-moderators-each-pfp"
                                src="uploads/<?php if ( $row99['avatar'] != NULL) :
                                    echo $row99['avatar'];
                                    else :
                                        echo "avatar-guest.png";
                                    endif;
                                    ?>">

                        <div class="right-block-moderators-each-name">
                            <p>
                                <?=$row99['full_name']?>
                            </p>
                            <p class="right-block-moderators-each-name-date">
                               From: <?=$row99['dateJoined']?>
                            </p>

                        </div>
                    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
                        $(document).ready(function() {
                            $(".right-block-moderators-each-name").each(function() {
                                var targetHeight = $(this).clone().html("&nbsp;").insertAfter($(this));

                                while ($(this).height() > targetHeight.height()) {
                                    $(this).css("font-size", parseInt($(this).css("font-size")) - 1);
                                }

                                targetHeight.remove();
                            });
                        });
                    </script> -->




                    </div>

                <?php endforeach; ?>

            </div>
        </div>

        <div class="right-block-avaiable-medals">
            <p>
                Medals you can get:
            </p>

            <div class="right-block-avaiable-medals-list">
                <?php foreach($row98 as $row98): ?>
                    <div class="right-block-avaiable-medals-each">

                        <div>

                            <img class="user-pfp"
                                src="
                                    <?=$row98['medal_avatar']?>
                                ">
                        </div>

                        <div class="right-block-avaiable-medals-each-name">
                            <?=$row98['medal_name']?>
                        </div>


                    </div>

                <?php endforeach; ?>

            </div>

        </div>
    </div>


</div>


</div>


</div>
</body>
</html>
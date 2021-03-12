<?php
        require 'db.php';
        include 'goodconnection.php';

        include 'menu.php';

    $page = isset($_GET['page']) ? $_GET['page']: 1;
    $limit = 1000;
    $offset = $limit * ($page - 1);

    $sql_select =  "SELECT * 
                    FROM post 
                    order by dateCreated DESC
                    LIMIT $limit OFFSET $offset";
    $result = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);


    $sql_select456 =  "SELECT *
                    FROM tags 
                    order by tag_count_visit DESC
                    LIMIT 5";
    $result456 = mysqli_query($conn, $sql_select456);
    $row456 = mysqli_fetch_all($result456, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">

    <title>Main page</title>
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
                    Popular tags:
                    <?php foreach($row456 as $row456): ?>
                        <a href="tag_page.php?tag_id=<?=$row456['tag_id']?>">
                            <div class="right-block-tags-tag">
                                <img class="tag-anime" src="uploads/<?php if ($row456['tag_picture'] != NULL) :
                                echo $row456['tag_picture'];
                            else :
                                echo "avatar-guest.png";
                            endif;?>">
                                <p>
                                    <?=$row456['tag_name']?>
                                </p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>  
                <!-- <div class="right-block-tags">
                </div> -->
            </div>

        
        </div>


    </div> 

</body>
</html>



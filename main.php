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
                    <img class="tag-anime" src="uploads/tenor.gif">
                    <img class="tag-anime" src="1.jpg">
                    <img class="tag-anime" src="1.jpg">
                    <img class="tag-anime" src="1.jpg">
                </div>  
            </div>

        
        </div>


    </div> 

</body>
</html>



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
    <?php
        session_start();

        if ($_SESSION['user']) {
            header('Location: ');
        }
        else 
            header('Location: vendor/signin.php');

    ?>
    <div class="menu">
        <div>
            <a href="main">
                <h3 class="logo">Joy<span>Reactor</span></h3>
            </a>
        </div>
        <div class="menu-form">
            <a href="form.php">
                <p>
                    Создать пост

                </p>
            </a>
        </div>
        <div class="user-menu">
            <div class="user-menu-user">
                <img class="user-menu-pfp" src="<?= $_SESSION['user']['avatar']?>">
                <p lass="user-menu-name">
                    <?= $_SESSION['user']['full_name']?>
                </p>
            </div>
            <a href="vendor/logout.php" class="logout">Выход</a>
        </div>
    </div>
    
<?php 
    include("db_conn1.php");
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
                    ";
    $result = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<div class="intro-user">


<div class="user-left">
        
        <?php foreach($row as $row): ?>
            <div class="post">
                <div class="user-post">
                
                   <a href="user_profile.php?id=<?=$row['user_id']?>">
                        <img class="user-pfp"
                            src="
                                <?php
                                    $myid2 = $row['post_id'];
                                    $sql_select2 = "SELECT distinct b.avatar
                                                    from post a
                                                    inner join users b 
                                                    on a.user_id = b.id
                                                    WHERE a.post_id = '$myid2'";
                                    $result2 = mysqli_query($conn, $sql_select2);
                                        while ($row2 = mysqli_fetch_assoc($result2))
                                            {
                                                echo $row2['avatar'];
                                            } 
                                ?>
                            ">
                    </a>


                    <div class="user-username">
                        <?php
                            $myid2 = $row['post_id'];
                            $sql_select2 = "SELECT distinct b.full_name
                                            from post a
                                            inner join users b 
                                            on a.user_id = b.id
                                            WHERE a.post_id = '$myid2'";
                            $result2 = mysqli_query($conn, $sql_select2);
                                while ($row2 = mysqli_fetch_assoc($result2))
                                    {
                                        echo "<p>" . $row2['full_name'] . "</p>";
                                    } 
                        ?>
                    </div>
        
                </div>
                
                
                <div class="post-tags">   

                    
                        <?php
                        global $myid;
                            $myid = $row['post_id'];
                            $sql_select1 = "SELECT distinct c.tag_name
                                            from post_tags g 
                                            inner join post b 
                                            on g.post_id = '$myid'
                                            inner join tags c 
                                            on g.tag_id = c.tag_id";
                            $result1 = mysqli_query($conn, $sql_select1);
                                while ($row1 = mysqli_fetch_assoc($result1))
                                    {
                                        echo "<div class=\"post-tag\">";
                                        echo "<p>" . $row1['tag_name'] . "</p>";
                                        echo "</div>";
                                    } 
                        ?>
                        <!-- <?=$row['post_id'] ?? ""?> -->
                    
                </div>
                <div class="post-text">
                    <p>
                        <?=$row['text']?>
                    </p>
                </div>
                <img class="post-image" id="<?=$row['text']?>" alt="KEKW" src="uploads/<?=$row['image']?>" >
                
                <!-- Modal -->

                <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>

                <script>
                    // Get the modal
                    var modal = document.getElementById('myModal');

                    // Get the image and insert it inside the modal - use its "alt" text as a caption
                    var img = document.getElementById('<?=$row['text']?>');
                    var modalImg = document.getElementById("img01");
                    var captionText = document.getElementById("caption");
                    img.onclick = function(){
                        modal.style.display = "block";
                        modalImg.src = this.src;
                        captionText.innerHTML = this.alt;
                    }

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];
                    var div1 = document.getElementsByClassName("modal-content")[0];
                    var div2 = document.getElementsByClassName("modal")[0];

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                    modal.style.display = "none";
                    }

                    div1.onclick = function() {
                    modal.style.display = "none";
                    }

                    div2.onclick = function() {
                    modal.style.display = "none";
                    }

                </script>
                <div class="post-bottom">
                    <div class="comments_and_date">
                        <div class="dateC">
                            <p>
                                <?=$row['dateCreated']?>
                            </p>
                        </div>
                    </div>

                </div>
                </div>
            <?php endforeach; ?>

</div>
<div class="user-right-block">
    <div class="user-right">
        <div class="user-right-info">
            <img class="user-info-img" src="<?=$row4['avatar']?>" alt="">
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

</body>
</html>
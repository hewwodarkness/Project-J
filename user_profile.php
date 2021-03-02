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
        require 'db.php';

    ?>
    <?php
    include("menu.php");
    ?>
    
<?php 
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
    <div class="intro">

<div></div>
<div></div>
<div class="main1">
    <div class="posts">
        <div class="post">
            <?php foreach($row as $row): ?>

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
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
                    </script>
                    <script src="js/user-info4.js">
                    </script>
        
                </div>
                
                
                <div class="post-tags">   

                    
                <?php
                                global $myid;
                                    $myid = $row['post_id'];
                                    $sql_select1 = "SELECT distinct c.tag_id, c.tag_name
                                                    from post_tags g 
                                                    inner join post b 
                                                    on g.post_id = '$myid'
                                                    inner join tags c 
                                                    on g.tag_id = c.tag_id";
                                    $result1 = mysqli_query($conn, $sql_select1);
                                        while ($row1 = mysqli_fetch_assoc($result1))
                                            {
                                                echo "<a class=\"post-tag-style\" href=\"tag_page.php?tag_id=" . $row1['tag_id'] . "\">";
                                                echo "<div class=\"post-tag\">";
                                                echo "<p>" . $row1['tag_name'] . "</p>";
                                                echo "</div>";
                                                echo "</a>";
                                            } 
                                ?>
                       
                    
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
                        
                        <div class="post-comments">
                            <p>
                                Comments
                            </p>
                        </div>

                        <div class="dateC">
                            <p>
                                <?=$row['dateCreated']?>
                            </p>
                        </div>

                        
                    </div>
                
                    
                    <div class="block-comments" id="<?=$row['comment_id']?>">
                        <?php global $my; ?>
                        
                        <?php
                            $myid = $row['post_id'];
                            $my = $myid;
                            $sql_select1 = "SELECT distinct c.comment_text, c.user_id, c.comment_id, u.full_name, u.avatar, c.rating, c.dateCreated
                                            from post_comments g 
                                            inner join post b 
                                            on g.post_id = '$myid'
                                            inner join comments c 
                                            on g.comment_id = c.comment_id
                                            inner join users u
                                            on c.user_id = u.id";
                            $mycomment = $row['comment_id'];
                            $result1 = mysqli_query($conn, $sql_select1);
                           
                                while ($row1 = mysqli_fetch_assoc($result1))
                                    {
                                        // $sql_select2 = "SELECT distinct u.full_name, u.avatar
                                        //                 from post_comments g 
                                        //                 inner join post b 
                                        //                 on g.post_id = '$myid'
                                        //                 inner join comments c 
                                        //                 on g.comment_id = c.comment_id
                                        //                 inner join users u
                                        //                 on c.user_id = u.id";
                                                            
                                                            
                                        // $result2 = mysqli_query($conn, $sql_select2);
                                        // while ($row2 = mysqli_fetch_assoc($result2))
                                        // {
                                        //     echo "<p>" . $row2['full_name'] . "</p>";
                                        // }
                                        echo "<div class=\"block-comments-one\">";
                                                    echo "<div class=\"block-comments-one-user-info\">";

                                                    echo "<a class=\"block-comments-one-user-info-link\" href=\"user_profile.php?id=".$row1['user_id']."\">";
                                                        echo "<img class=\"block-comments-one-user-pfp\" src=" . $row1['avatar'] . ">";
                                                        echo "<p class=\"block-comments-one-user-username\">" . $row1['full_name'] . "</p>";
                                                    echo "</a>";
                     
                                                        echo "<p class=\"block-comments-one-user-rating\"> Rating:  ";
                                                            echo $row1['rating'];
                                                        echo "</p>";

                                                    echo "</div>";
                                                    echo "<div class=\"block-comments-one-text-and-rating\">";
                                                            echo "<p class=\"block-comments-one-text\">" . $row1['comment_text'] . "</p>";
                        

                                                            echo "<p class=\"block-comments-one-user-datecreated\"> Date created:  ";
                                                                echo $row1['dateCreated'];
                                                            echo "</p>";
                                                     
                                                    echo "</div>";
                                                echo "</div>";
                                        
                                    }  
                        ?>
                        <div class="createComment">
                                    <form action="actionComment.php" method="post">
                                        <!-- <p>
                                            <?php echo $my ?>
                                        </p> -->
                                        <?php 
                                            // $lastid = "SELECT comment_id
                                            // FROM post_comments 
                                            // ORDER BY comment_id
                                            // DESC LIMIT 1";
                                            // $lastid1 = $lastid;
                                            // $result2 = mysqli_query($conn, $lastid1);
                                            // while ($row2 = mysqli_fetch_assoc($result2))
                                            // {
                                            //     echo $row2['comment_id'];
                                            // }
                                        ?>
                                        <input type="hidden" name="a" value="<?php echo $my ?>" />
                                        <input class="comment1" type="comment" name="comment" placeholder="Press your comment here">
                                        <button class="button-comment" type="submit">Отправить</button>
                                    </form>

                                </div>
                    </div>

                   

                    <script>

                        // var comm1 = document.getElementById('<?=$row['comment_id']?>');
                        // var comm2 = document.getElementsByClassName("post-comments")[0];
                        
                        
                        // comm1.onclick = function() {
                        // comm1.style.display = "none";
                        // }

                        // comm1.addEventListener("click", () => {
                        //     comm2.classList.toggle("active");
                        // });
                        // var div2 = document.getElementsByClassName("modal")[0];

                       
                    // Get the modal
                    

                    // Get the image and insert it inside the modal - use its "alt" text as a caption
                    // var img2 = document.getElementById('<?=$row['comment_id']?>');
                    
                    // img2.onclick = function(){
                    //     img2.style.display = "none";
                        
                    // }


                    </script>
                   

                </div>
                
            <?php endforeach; ?>

        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
                        // $('.post-comments').click(function(){
                        //     element = document.getElementById(<?=$row['comment_id']?>);
                        // $(element).fadeToggle(0);
                        // }

                        
                        // const container = document.querySelector('.post-comments');

                        // container.addEventListener('click', function(e) {
                        //     const items = document.querySelectorAll('.block-comments')
                        //     const target = e.target
                        // Array.from(items).forEach(item => {
                        //     item.classList.remove('active')
                        // })
                        // target.classList.add('active')
                        // })

                            // jQuery(function($) {
                            //     $('.post-comments').click(function(){
                            //         $(this).closest('.post-comments').css("background-color", "red");
                            //     });
                            // });

                            // $(".post-comments").click(function() {
                                
                            //     alert(".block-comments".id);
                            //     $(".content").css("background-color", "");
                            //     $(this).css("background-color", "red");
                            // });
                    </script>
    </div>
    <div class="right-block">
        <div class="right-block-tags">
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


               
</div>
</body>
</html>
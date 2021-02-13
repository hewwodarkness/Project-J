<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Main page</title>
</head>
<body>

    <div class="menu">

        <h3 class="logo">Joy<span>Reactor</span></h3>

    </div>
    
    <?php
    include("db_conn1.php");

    $page = isset($_GET['page']) ? $_GET['page']: 1;
    $limit = 5;
    $offset = $limit * ($page - 1);

    $sql_select =  "SELECT * 
                    FROM post 
                    order by post_id DESC
                    LIMIT $limit OFFSET $offset";
    $result = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    
    // $sql_select2 = "SELECT *
    //                 FROM post
    //                 LEFT JOIN post_tags
    //                 ON post.post_id = post_tags.post_id
    //                 LEFT JOIN tags
    //                 ON post_tags.tag_id = tags.tag_id
    //                 WHERE post.post_id = post_tags.post_id";    

  
    //$row2 = mysqli_fetch_all($result1, MYSQLI_ASSOC);

//     <?php
//     $sql_select1 = "SELECT distinct c.tag_name
//     from post_tags g 
//     inner join post b 
//     on g.post_id = b.post_id
//     inner join tags c 
//     on g.tag_id = c.tag_id";
//     $result1 = mysqli_query($conn, $sql_select1);
//     while ($row1 = mysqli_fetch_assoc($result1))
//         {
//             echo "<p>" . $row1['tag_name'] . "</p>";
//         } 
// ?>

    <div class="intro">

        <div></div>
        <div></div>

        <div class="main1">
            <div class="posts">
                <div class="post">
                    <?php foreach($row as $row): ?>
                    
                        <div class="user-post">
                            <img class="user-pfp" src="http://img0.joyreactor.cc/pics/avatar/user/310186">

                            <div class="user-username">
                                <p>No_feelings</p>
                            </div>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                            <script src="js/user-info4.js"></script>
                
                        </div>
                        
                        
                        <div class="post-tags">   

                            
                                <?php
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
                                
                                <div class="post-comments" id="<?=$row['comment_id']?>">
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
                            <div class="block-comments">
                                
                                
                                <?php
                                    $myid = $row['post_id'];
                                    $sql_select1 = "SELECT distinct c.comment_text
                                                    from post_comments g 
                                                    inner join post b 
                                                    on g.post_id = '$myid'
                                                    inner join comments c 
                                                    on g.comment_id = c.comment_id";
                                    $result1 = mysqli_query($conn, $sql_select1);
                                        while ($row1 = mysqli_fetch_assoc($result1))
                                            {
                                                echo "<div class=\"post-tag\">";
                                                echo "<p>" . $row1['comment_text'] . "</p>";
                                                echo "</div>";
                                            }  
                                ?>


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


                            </script>
                           

                        </div>

                    <?php endforeach; ?>

                </div>
                
            </div>

            <div class="tags-rightside">
                <img class="tag-anime" src="1.jpg">
                <img class="tag-anime" src="1.jpg">
                <img class="tag-anime" src="1.jpg">
                <img class="tag-anime" src="1.jpg">
            </div>  

        
        </div>


    </div> 

</body>
</html>



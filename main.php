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
    $limit = 2;
    $offset = $limit * ($page - 1);

    $sql_select = "SELECT * FROM post ORDER BY post_id LIMIT $limit OFFSET $offset";
    $result = mysqli_query($conn, $sql_select);
    $row1 = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $sql_select1 = "SELECT * FROM post ORDER BY post_id LIMIT $limit OFFSET $offset";    
    $result1 = mysqli_query($conn, $sql_select1);
    $row = mysqli_fetch_all($result1, MYSQLI_ASSOC);

    
?>

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
                            <div class="post-tag">
                                Anime
                            </div>
                            <div class="post-tag">
                                Girl
                            </div>
                        </div>
                        <div>
                            <p> <?=$row['text']?>
                        </div>
                        <img class="post-image" id="myImg" alt="KEKW" src="uploads/<?=$row['image']?>" >
                        
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
                            var img = document.getElementById('myImg');
                            var modalImg = document.getElementById("img01");
                            var captionText = document.getElementById("caption");
                            img.onclick = function(){
                            modal.style.display = "block";
                            modalImg.src = this.src;
                            captionText.innerHTML = this.alt;
                            }

                            // Get the <span> element that closes the modal
                            var span = document.getElementsByClassName("close")[0];

                            // When the user clicks on <span> (x), close the modal
                            span.onclick = function() {
                            modal.style.display = "none";
                            }

                        </script>
                    <?php endforeach; ?>
                    <!-- Modal -->


                    <div class="post-comments">
                        <p>Comments</p>
                    </div>
                </div>

                

                
            </div>

            <div class="tags">
            <img class="tag-anime" src="1.jpg">
            <img class="tag-anime" src="1.jpg">
            <img class="tag-anime" src="1.jpg">
            <img class="tag-anime" src="1.jpg">
            </div>  

        
        </div>


    </div>

</body>
</html>



<div class="posts">
                <div class="post">
                
                    <?php foreach($row as $row): ?>
                        <?php global $deletepost;
                            $deletepost = $row['post_id']; ?>
                        <?php if (isset($_SESSION['user'])): ?>
                            <?php if ($row['user_id'] == $_SESSION['user']['id']): ?>

                                <div class="user-post-delete-post">
                                    <form action="actionPostDelete.php" method="post">

                                        <input type="hidden" name="a1" value="<?php echo $deletepost ?>"/>
                                        <button class="user-post-delete-post-button" type="submit">X</button>
                                    </form>
                                </div>
                            <? else: ?>

                            <?php endif; ?>
                            <?php endif; ?>
                        <div class="user-post">
                        
                           <a href="user_profile.php?id=<?=$row['user_id']?>">
                                <img class="user-pfp"
                                    src="uploads/<?php
                                            $myid2 = $row['post_id'];
                                            $sql_select2 = "SELECT distinct b.avatar
                                                            from post a
                                                            inner join users b 
                                                            on a.user_id = b.id
                                                            WHERE a.post_id = '$myid2'";
                                            $result2 = mysqli_query($conn, $sql_select2);
                                                while ($row2 = mysqli_fetch_array($result2))
                                                    {
                                                        if ( $row2['avatar'] != NULL) :
                                                            echo $row2['avatar'];
                                                        else :
                                                            echo "avatar-guest.png";
                                                        endif;
                                                    } 
                                        ?>">
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
                        <img class="post-image" id="<?=$row['text']?>" alt="" src="uploads/<?=$row['image']?>" >
                        
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
                                                echo "<div class=\"block-comments-one\">";
                                                if (isset($_SESSION['user'])):
                                                if ($row1['user_id'] == $_SESSION['user']['id']):
                                                    global $deletecomment;
                                                    $deletecomment = $row1['comment_id'];
                                                    echo "<div class=\"user-post-delete-post\">";
                                                        echo "<form action=\"actionCommentDelete.php\" method=\"post\">";
                    
                                                            echo "<input type=\"hidden\" name=\"a1\" value=\"$deletecomment\"/>";
                                                            echo "<button class=\"user-post-delete-post-button\" type=\"submit\">X</button>";
                                                        echo "</form>";
                                                    echo "</div>";
                                                    else :
                                                endif;
                                                endif;
                                                    echo "<div class=\"block-comments-one-user-info\">";

                                                    echo "<a class=\"block-comments-one-user-info-link\" href=\"user_profile.php?id=".$row1['user_id']."\">";
                                                        echo "<img class=\"block-comments-one-user-pfp\" src=\"";
                                                            if ( $row1['avatar'] != NULL) :
                                                                echo "uploads/". $row1['avatar'] . "\">";
                                                                // echo ">\"";
                                                            else :
                                                                 echo "uploads/avatar-guest.png";
                                                                 echo "\">";
                                                            endif;
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

                                        ?>
                                        <input type="hidden" name="a" value="<?php echo $my ?>" />
                                        <input class="comment1" type="comment" name="comment" placeholder="Press your comment here">
                                        <button class="button-comment" type="submit">Отправить</button>
                                    </form>

                                </div>
                            </div>
  

                        </div>
                        
                    <?php endforeach; ?>

                </div>
                
            </div>
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


    <div class="intro">

        <div></div>
        <div></div>

        <div class="main1">

            <div class="posts">
                <div class="post">
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
                    <img class="post-image" id="myImg" alt="KEKW" src=http://img10.joyreactor.cc/pics/post/%D0%B0%D1%80%D1%82-%D0%B1%D0%B0%D1%80%D1%8B%D1%88%D0%BD%D1%8F-art-Nell-Nelson-6479567.jpeg>
                    
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

                    <!-- Modal -->


                    <div class="post-comments">
                        <p>Comments</p>
                    </div>
                </div>

                <div class="post">
                    <div class="user-post">
                        <img class="user-pfp" src="http://img0.joyreactor.cc/pics/avatar/user/310186">
                        
                        <div class="user-username">
                            <p>No_feelings</p>
                        </div>
                    </div>
                    <div class="post-tags">
                        <div class="post-tag">
                            Anime
                        </div>
                        <div class="post-tag">
                            Girl
                        </div>
                    </div>
                    <img class="post-image" id="myImg1" alt="KEKW" src=http://img10.joyreactor.cc/pics/post/Anime-t-bone-%2806tbone%29-Ruler-%28FateApocrypha%29-FateApocrypha-6480014.jpeg>
                    
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
                        var img = document.getElementById('myImg1');
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



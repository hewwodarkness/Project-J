<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>
<body>
    

    <div class="menu">

        <div class="url">
            Joyreactor
        </div>

    </div>


    <div class="intro">

        <div></div>
        <div></div>

        <div class="main1">

            <div class="posts">
                <div class="post">
                    <div class="user-post">
                        <img class="user-pfp" src="http://img1.joyreactor.cc/pics/avatar/user/801497">
                        <div class="drop">
                            
                        </div>
                        <div class="user-username">
                            Virgo
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

                </div>
            </div>

            <div class="tags">
                fwfdw
            </div>  

        
        </div>


    </div>



</body>
</html>



<?php include 'goodconnection.php'; ?>
<!DOCTYPE html>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="img/8.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
</head>
<body>
        
            
        <?php
            require 'db.php';
            if ($_SESSION['user1'])
            {
                header('Location: ');
            }
            else 
                header('Location: login.php');

        ?>
   <?php
        include 'menu.php';
    ?>
    
    
    <php>
    <form name="feedback" method="POST" action="action.php" enctype="multipart/form-data">
        <div class="intro">

            <input type="file" name="my_image">
            <p> text: </p>
            <h1 class="features__title"><input type="text" name="text"></h1>
            <p> tags: </p>
            <h1 class="tagsss"><input type="text1" name="text1"></h1>

        </div>
              
          <!-- <?php
                $sql_select1 = "SELECT tag_name
                                from tags";
                                
                $result1 = mysqli_query($conn, $sql_select1);
                    while ($row1 = mysqli_fetch_assoc($result1))
                        {
                            echo "<div class=\"post-tag\">";
                            echo "<p>" . $row1['tag_name'] . "</p>";
                            echo "</div>";
                        } 
            ?> -->
          <!-- Alert -->
          
          <input type="submit" name="send" value="Отправить">
                        </form>

      </div>
   </body>
</html>
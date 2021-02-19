<?php include "db_conn1.php"; ?>
<!DOCTYPE html>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="img/8.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
</head>
<body>
        
            <!-- <?=$row['post_id'] ?? ""?> -->
        <?php
            session_start();
            if (!$_SESSION['user']) {
                header('Location: /');
            }
        ?>
            <img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt="">
            <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></h2>
            <br>
            <a href="#"><?= $_SESSION['user']['email'] ?></a>
            <br>
            <?php
                print_r($_SESSION['user']['id']);
            ?>
            <br>
            <a href="vendor/logout.php" class="logout">Выход</a>
            <br>
    <php>
    <form name="feedback" method="POST" action="action.php" enctype="multipart/form-data">
        <div class="intro">

            <input type="file" name="my_image">
            <h1 class="features__title"><input type="text" name="text"></h1>
            <h1 class="tagsss"><input type="text1" name="text1"></h1>

        </div>
              
          <?php
                $sql_select1 = "SELECT tag_name
                                from tags";
                                
                $result1 = mysqli_query($conn, $sql_select1);
                    while ($row1 = mysqli_fetch_assoc($result1))
                        {
                            echo "<div class=\"post-tag\">";
                            echo "<p>" . $row1['tag_name'] . "</p>";
                            echo "</div>";
                        } 
            ?>
          <!-- Alert -->
          
          <input type="submit" name="send" value="Отправить">
                        </form>

      </div>
   </body>
</html>
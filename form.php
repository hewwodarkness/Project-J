<!DOCTYPE html>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="img/8.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
</head>
<body>
        <?php
            session_start();
            if (!$_SESSION['user']) {
                header('Location: /');
            }
        ?>
            <img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt="">
            <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></h2>
            <a href="#"><?= $_SESSION['user']['email'] ?></a>
            <?php
                print_r($_SESSION['user']['id']);
            ?>
            <a href="vendor/logout.php" class="logout">Выход</a>
    <php>
    <form name="feedback" method="POST" action="action.php" enctype="multipart/form-data">
      <div class="intro">
          <div class="features">
              <div class="features__item">
                  <img class="features__icon" alt="">
                  <input type="file" name="my_image">
                  <h1 class="features__title"><input type="text" name="text"></h1>
                  <div class="features__text">An average player</div>
                  <div>
                  
                  </div>
              </div>
            
          </div>
      
          <!-- Alert -->
          
          <input type="submit" name="send" value="Отправить">
                        </form>

      </div>
   </body>
</html>
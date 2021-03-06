<link rel="icon" href="uploads/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="uploads/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/menu.css">
<body>
    <div class="nav">
        <div class="menu">
            <div class="left-menu">
                <a href="main.php">
                    <h3 class="logo">Project
                        <span>
                            J
                        </span>
                    </h3>
                </a>
            </div>

            <div class="user-menu">

                <?php if ( isset ($_SESSION['user']) ) : ?>

                <a class="create-post" href="form.php">
                    <p class="newtext">
                        Создать пост
                    </p>
                </a>
                    
                        <a href="user_profile.php?id=<?=$_SESSION['user1']['id']?>">

                        <div class="user-menu-user">
                            <?php if ( $_SESSION['user1']['avatar'] != NULL) : ?>
                                <img class="user-menu-pfp" src="uploads/<?=$_SESSION['user1']['avatar']?>">
                            <?php else : ?>
                                <img class="user-menu-pfp" src="uploads/avatar-guest.png">
                            <?php endif; ?>
                            <p lass="user-menu-name">
                                <?=$_SESSION['user1']['full_name']?>
                            </p>
                        </div>
                    </a>

                    <a href="logout.php" class="logout">
                        Выход
                    </a>

                <?php else : ?>
                <a class="fontpls" href="login.php">Авторизация</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
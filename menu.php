

<div class="menu">
        <div>
            <a href="main.php">
                <h3 class="logo">Project
                    <span>
                        J
                    </span>
                </h3>
            </a>
        </div>
        <div class="menu-form">
            
        </div>
        <div class="user-menu">
            <a class="create-post" href="form.php">
                <p>
                    Создать пост
                </p>
            </a>
            <a href="user_profile.php?id=<?=$_SESSION['user1']['id']?>">
                <div class="user-menu-user">
                    <img class="user-menu-pfp" src="<?= $_SESSION['user1']['avatar']?>">
                    <p lass="user-menu-name">
                        <?=$_SESSION['user1']['full_name']?>
                    </p>
                </div>
            </a>

            <a href="logout.php" class="logout">
                Выход
            </a>
            
        </div>
    </div>
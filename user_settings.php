<?php include 'goodconnection.php';
 require 'db.php';

include 'menu.php';

global $iduser;
$iduser = $_SESSION['user']['id'];
?>
<!DOCTYPE html>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="shortcut icon" href="img/8.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
</head>
<body>

<div class="formpost"> 
    <div class="formcreate">
        
   
        <form name="feedback" method="POST" action="actionUserSettingsAvatarChange.php" class="form-booking" enctype="multipart/form-data">

            <input type="hidden" name="a3" value="<?php echo $iduser ?>" />
            <p> To change your avatar please choose: </p>
            <input type="file" name="file">
        
            <input type="submit" name="send" value="Send">
        </form>

        <form name="feedback1" method="POST" action="actionUserSettingsNicknameChange.php" class="form-booking">

            <input type="hidden" name="a3" value="<?php echo $iduser ?>" />
           
            <p> To change your nickname please write down: </p>
            <input type="full_name" name="full_name" placeholder="Your nickname"><br/>

            <input type="submit" name="send" value="Send">
        </form>

    </div>

</div>

</body>
</html>
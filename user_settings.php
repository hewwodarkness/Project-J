<?php include 'goodconnection.php';
 require 'db.php';

include 'menu.php';

$sql_select49 =  "SELECT *
                FROM tags";

$result49 = mysqli_query($conn, $sql_select49);
$row49 = mysqli_fetch_all($result49, MYSQLI_ASSOC);
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
            <p> Picture: </p>
            <input type="file" name="file">
        
            <input type="submit" name="send" value="Отправить">
        </form>

    </div>

</div>

</body>
</html>
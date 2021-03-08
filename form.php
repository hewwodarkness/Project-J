<?php include 'goodconnection.php';
 require 'db.php';
//  if ($_SESSION['user1'])
//  {
//      header('Location: ');
//  }
//  else
//      header('Location: login.php');


include 'menu.php';

$sql_select49 =  "SELECT *
                FROM tags";

$result49 = mysqli_query($conn, $sql_select49);
$row49 = mysqli_fetch_all($result49, MYSQLI_ASSOC);

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
        
    <script> 
        document.querySelector('.post-tag').addEventListener('change', function(e) {
        document.querySelector('.text1').textContent = e.target.nextElementSibling.textContent;
        });
    </script>
        <form name="feedback" method="POST" action="action_new.php" class="form-booking" enctype="multipart/form-data">

            <p> Tags: </p>
            <div class="tagslist">
                <?php foreach($row49 as $row49):

                    echo "<a class=\"post-tag-style\">";
                    echo "<div class=\"post-tag\">";
                    echo "<p>" . $row49['tag_name'] . "</p>";
                    echo "</div>";
                    echo "</a>";
                endforeach;?>


            </div>

            <h1 class="tagsss"><input type="text1" name="text1"></h1>
            <p> Text: </p>
            <h1 class="features__title"><input type="text" name="text"></h1>
            <p> Picture: </p>
            <input type="file" name="file">
        
            <input type="submit" name="send" value="Отправить">
        </form>

    </div>

</div>

</body>
</html>
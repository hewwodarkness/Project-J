<!DOCTYPE html>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">


<?php 
    include("db_conn1.php");
    $id = $_GET['id'];

    $sql_select =  "SELECT *
                    FROM users
                    WHERE id ='$id'";

    $result = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<div class="intro">
    
            <img src="<?=$row['avatar']?>" alt="">
            <h1><?=$row['full_name']?></h1>
</div>
<?php include "db_conn1.php"; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<?php
    session_start();
    $post_id = abs( crc32( uniqid() ) );;;
    // $dateCreated = $_POST["dpi"];
    $user_id = $_SESSION['user']['id'];
    
    $text = $_POST['comment'];
    $post_rating = 1111;
    $a  = $_POST['a'];

    $lastid =  "SELECT comment_id
                FROM post_comments 
                ORDER BY comment_id
                DESC LIMIT 1";
        $lastid1 = $lastid;
        global $test;
            $result2 = mysqli_query($conn, $lastid1);
                while ($row2 = mysqli_fetch_assoc($result2))
                {
                    echo $row2['comment_id'];
                    $test = $row2['comment_id'];
                    $test = $test + 1;
                    $sql = "INSERT INTO `post_comments` (`post_id`, `comment_id`)
                            VALUES     ('$a', '$test')";
                    $sql1 = "INSERT INTO `comments` (`comment_id`, `comment_text`, `user_id`)
                            VALUES     ('$test', '$text' , '$user_id')";
                }

    // $sql = "INSERT INTO `post_comments` (`post_id`, `comment_id`)
    //         VALUES     ('$a', '$test')
    //         -- INSERT INTO 'comments' (`comment_id`, `comment_text`, `user_id`)
    //         -- VALUES     ('$lastid', '$text' , '$user_id')
    //         ";

            mysqli_query($conn, $sql);
            mysqli_query($conn, $sql1);
header('Location: main.php ');
$conn->close();
?>
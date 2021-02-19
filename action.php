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
$img_name = $_FILES['my_image']['name'];
$img_size = $_FILES['my_image']['size'];
$tmp_name = $_FILES['my_image']['tmp_name'];
$error = $_FILES['my_image']['error'];
// -------------------------------------------------------------
if ($error === 0) {
    if ($img_size > 12500000000) {
        $em = "Sorry, your file is too large.";

    }else {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg", "jpeg", "png", "PNG", "gif"); 

        if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
            $img_upload_path = 'uploads/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            // Insert into Database
            
                $post_id = abs( crc32( uniqid() ) );;;
               // $dateCreated = $_POST["dpi"];
                $user_id = $_SESSION['user']['id'];
                $text = $_POST["text"];
                $post_rating = 1111;

                $pizza  = $_POST["text1"];
                $pieces = explode(",", $pizza);
                echo $pieces[0]; // кусок1
                echo $pieces[1]; // кусок2

            $sql = "INSERT INTO `post` (`post_id`, `user_id`, `comment_id`, `tags_id`, `post_rating`, `image`, `text`)
                    VALUES             ('$post_id', '$user_id', '$post_id', '$post_id', '$post_rating', '$new_img_name', '$text')";

            // while ($i < 10) {
            //     if 
            //     $sql = "INSERT INTO `tags` (`post_id`, `tag_id`)
            //             VALUES     ('$post_id', '$pieces[$i]')";
            // }

            if ($sql === FALSE)
                echo "Ошибка записи в базу: ".mysqli_error($sql);
            else
                echo 'Вы успешно зарегистрированы! <a href="main.php">На главную</a>';
            mysqli_query($conn, $sql);
        } else {
            $em = "You can't upload files of this type";
        }
    }
}else {
    $em = "unknown error occurred!";
}
header('Location: main.php ');
$conn->close();
?>
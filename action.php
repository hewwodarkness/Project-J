<?php include 'goodconnection.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<?php
require 'db.php';
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
            
                // $post_id = abs( crc32( uniqid() ) );;;
                
               // $dateCreated = $_POST["dpi"];
                $user_id = $_SESSION['user']['id'];
                $text = $_POST["text"];
                $post_rating = 1111;

                $pizza  = $_POST["text1"];
                $pieces = explode(",", $pizza);

                $lastid6 =  "SELECT post_id
                            FROM post
                            ORDER BY post_id
                            DESC LIMIT 1";

                $post_id = mysqli_query($conn, $lastid6)->fetch_assoc()['post_id'];
                $post_id = $post_id + 1;
                $sql = "INSERT INTO `post` (`post_id`, `user_id`, `comment_id`, `tags_id`, `post_rating`, `image`, `text`)
                        VALUES             ('$post_id', '$user_id', '$post_id', '$post_id', '$post_rating', '$new_img_name', '$text')";

                
                         $i = 0;
                while ($i < count($pieces)) 
                {

                    $pis = $pieces[$i];
                    echo $pis;
                    echo count($pieces);
                    $sql3 = mysqli_query($conn, "SELECT * 
                                                 FROM tags
                                                 WHERE tag_name = '$pis'");
                    if(mysqli_num_rows($sql3)>=1)
                    {
                        echo "name already exists";
                        $i = $i + 1;
                        //echo $sql3['tag_id'];
                        $result233 = $sql3->fetch_assoc()['tag_id'];
                        echo $result233;
                        $sql5 = "INSERT INTO `post_tags` (`post_id`, `tag_id`)
                              VALUES             ('$post_id', '$result233')";
                              mysqli_query($conn, $sql5);
                    }
                    else
                        {
                            $lastid =  "SELECT tag_id
                                        FROM tags
                                        ORDER BY tag_id
                                        DESC LIMIT 1";

                            $result23 = mysqli_query($conn, $lastid)->fetch_assoc()['tag_id'];
                            $result23 = $result23+1;

                            $sql2 = "INSERT INTO `tags` (`tag_id`, `tag_name`)
                                            VALUES      ('$result23', '$pis')";
                                   mysqli_query($conn, $sql2);         

                            $sql1 = "INSERT INTO `post_tags` (`post_id`, `tag_id`)
                              VALUES             ('$post_id', '$result23')";
                              mysqli_query($conn, $sql1);

                              $sql8 = "INSERT INTO `tags_moderators` (`tag_id`, `user_id`)
                              VALUES      ('$result23', '$user_id')";

                            mysqli_query($conn, $sql8);       

                              
                                            
                                            $i = $i + 1;
                        }
                }           
                

                // $sql1 = "INSERT INTO `post_tags` (`post_id`, `tag_id`)
                //               VALUES             ('$post_id', 1)";
                
                    // while ($i < count($pieces)) 
                    // {
                    //     $temp = $pieces[$i];
                    //     $str_sql_query2 =  "SELECT tag_name 
                    //                         FROM tags 
                    //                         WHERE tag_name = '$temp'";

                    //     $result2 = mysqli_query($conn, $str_sql_query2);  

                    //     while (!mysqli_fetch_assoc($result2))
                    //     {

                    //         $lastid =  "SELECT tag_id
                    //                     FROM tags
                    //                     ORDER BY tag_id
                    //                     DESC LIMIT 1";

                    //         $result23 = mysqli_query($conn, $lastid);
                    //             $temp1 = $pieces[$i];
                    //             $sql2 = "INSERT INTO `tags` (`tag_id`, `tag_name`)
                    //             VALUES          ('$result23', '$temp1')";
                                
                                

                    //             mysqli_query($conn, $sql2);
                    //             if ($sql2 === FALSE)
                    //                 echo "Ошибка записи в базу: ".mysqli_error($sql2);
                    //             else
                    //                 echo 'Вы успешно зарегистрированы!';
                    //     }
        
                    //     // else 
                    //     // {
                    //     //     // echo "Ошибка записи в базу: ".mysqli_error($sql2);
                    //     //     continue;
                    //     // }
                    // };
        // $i = 0;
        // echo count($pieces);
            // while ($i < count($pieces)) 
            // {
            //     $str_sql_query2 =  "SELECT tag_name 
            //                         FROM tags 
            //                         WHERE tag_name = '$pieces[$i]'";

            //             $lastid =  "SELECT tag_id
            //                         FROM tags
            //                         ORDER BY tag_id
            //                         DESC LIMIT 1";
                    
            //         global $test;
            //     $result3 = mysqli_query($conn, $lastid);
            //     $result2 = mysqli_query($conn, $str_sql_query2);  
            //     // $result2 = mysqli_query($conn, $sql_select2);
                // if (!mysqli_fetch_array($result2))
                // {
                //     // echo $lastid;
                //     // echo $pieces[$i];

                //     $sql2 = "INSERT INTO `tags` (`tag_id`)
                //              VALUES             ('$result3')";
                //              mysqli_query($conn, $sql2);
                // }

                // else 
                // {
                //     // echo "Ошибка записи в базу: ".mysqli_error($sql2);
                //     continue;
                // }
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
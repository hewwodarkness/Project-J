<?php

	include 'menu.php';
	require 'db.php';
	include 'goodconnection.php';

    $upload_dir = 'uploads/';
	$file = $_FILES['file']['name'];
	// $file = "uploads/".$_FILES['file']['name'];
	move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir . $file);


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
            VALUES             ('$post_id', '$user_id', '$post_id', '$post_id', '$post_rating', '$file', '$text')";


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

            $sql166 = "INSERT INTO `tags_followers` (`tag_id`, `user_id`)
            VALUES             ('$result23', '$user_id')";
            mysqli_query($conn, $sql166);
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

                $sql16 = "INSERT INTO `tags_followers` (`tag_id`, `user_id`)
                  VALUES             ('$result23', '$user_id')";
                  mysqli_query($conn, $sql16);


                                $i = $i + 1;
            }
    }
    mysqli_query($conn, $sql);
    $conn->close();
    header('Location: main.php ');
?>
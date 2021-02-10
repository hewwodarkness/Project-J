<?php include "db_conn1.php"; ?>
<?php
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

        $allowed_exs = array("jpg", "jpeg", "png","gif"); 

        if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
            $img_upload_path = 'uploads/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            // Insert into Database
            
                $post_id = abs( crc32( uniqid() ) );;;
               // $dateCreated = $_POST["dpi"];
                
                $text = $_POST["text"];



            $sql = "INSERT INTO `post` (`post_id`, `comments_id`, `tags_id`, 
                                        `image`, `text`)
            VALUES ('$post_id', '$post_id', '$post_id', '$new_img_name', '$text')";
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
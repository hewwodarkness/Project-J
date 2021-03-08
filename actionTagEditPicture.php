<?php
include 'goodconnection.php';
require 'db.php';

$a2 = $_POST['a2'];

$upload_dir = 'uploads/';
$file = $_FILES['file']['name'];
// $file = "uploads/".$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir . $file);
    
$db_query1 = "UPDATE tags SET tag_picture = '$file' WHERE tag_id = '$a2'";

mysqli_query($conn, $db_query1);


header('Location: tag_page.php?tag_id='.$a2.'.php ');
// if($result) {
//  echo "Account deleted!";
// }
?>
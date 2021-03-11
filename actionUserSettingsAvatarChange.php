<?php
include 'goodconnection.php';
require 'db.php';

$a3 = $_POST['a3'];

$upload_dir = 'uploads/';
$file = $_FILES['file']['name'];
// $file = "uploads/".$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir . $file);
    
$db_query1 = "UPDATE users SET avatar = '$file' WHERE id = '$a3'";

mysqli_query($conn, $db_query1);

$user1['avatar'] = $file;
$_SESSION['user1']['avatar'] = $file;

header('Location: user_profile.php?id='.$a3.'');
// header('Location: menu.php');
// if($result) {
//  echo "Account deleted!";
// }
?>
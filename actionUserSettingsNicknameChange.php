<?php
include 'goodconnection.php';
require 'db.php';

$a3 = $_POST['a3'];
$text = $_POST["full_name"];

    
$db_query1 = "UPDATE users SET full_name = '$text' WHERE id = '$a3'";

mysqli_query($conn, $db_query1);

$user1['full_name'] = $text;
$_SESSION['user1']['full_name'] = $text;

header('Location: user_profile.php?id='.$a3.'');
// header('Location: menu.php');
// if($result) {
//  echo "Account deleted!";
// }
?>
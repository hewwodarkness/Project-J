<?php
include 'goodconnection.php';
require 'db.php';

$a1 = $_POST['a1'];

$db_query1 = "DELETE FROM post_comments WHERE comment_id = '$a1'";
$db_query2 = "DELETE FROM comments WHERE comment_id = '$a1'";
mysqli_query($conn, $db_query1);
mysqli_query($conn, $db_query2);
header('Location: main.php ');
// if($result) {
//  echo "Account deleted!";
// }
?>
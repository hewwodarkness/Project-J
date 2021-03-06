<?php
include 'goodconnection.php';
require 'db.php';

$a1 = $_POST['a1'];

$db_query = "DELETE FROM post WHERE post_id = '$a1'";
$db_query1 = "DELETE FROM post_comments WHERE post_id = '$a1'";
$db_query2 = "DELETE FROM post_tags WHERE post_id = '$a1'";
mysqli_query($conn, $db_query);
mysqli_query($conn, $db_query1);
mysqli_query($conn, $db_query2);
header('Location: main.php ');
// if($result) {
//  echo "Account deleted!";
// }
?>
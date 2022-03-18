<?php
include('database_connection.php');
$id = $_POST['delete_id'];
$sql = "DELETE FROM tbl_comment_post WHERE comment_id = '$id'";
 $statement = $connect->prepare($sql);
  $statement->execute();
if ($statement) {
	$sql2 = "DELETE FROM tbl_reply WHERE comment_id = '$id'";
 $statement2 = $connect->prepare($sql2);
  $statement2->execute();
}
?>
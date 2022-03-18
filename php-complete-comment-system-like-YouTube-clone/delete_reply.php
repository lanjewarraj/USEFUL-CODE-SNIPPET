<?php
include('database_connection.php');
$id = $_POST['delete_id'];
$sql = "DELETE FROM tbl_reply WHERE reply_id = '$id'";
 $statement = $connect->prepare($sql);
  $statement->execute();
?>
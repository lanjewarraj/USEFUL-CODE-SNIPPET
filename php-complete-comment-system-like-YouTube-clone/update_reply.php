<?php
include('database_connection.php');
if(!empty($_POST['editReply_id']) && !empty($_POST['edit_reply'])){
$id = $_POST['editReply_id'];
$reply_update = $_POST['edit_reply'];
date_default_timezone_set("Africa/Lagos");
$update_date = date('Y-m-d H:i:s');
$sql = "UPDATE tbl_reply SET replies = '$reply_update', timestamp = '$update_date' WHERE reply_id = '$id'";
 $statement = $connect->prepare($sql);
  $statement->execute();
 if(!$statement){                      
                     $status = 'err';
                }
                   else{
                   $status = 'ok';           
          
                   }  
    // Output status
    echo $status;die;
}


?>
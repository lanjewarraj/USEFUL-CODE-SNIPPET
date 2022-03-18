<?php
//Report User
include('database_connection.php');
if(!empty($_POST['report']) && !empty($_POST['reply_postID']) && !empty($_POST['page_post']) && !empty($_POST['reported_email']) && !empty($_POST['reported_content']) && !empty($_POST['reported_user'])){ 
$reported_email = $_POST['reported_email'];
$reported_content = $_POST['reported_content'];
$reported_user = $_POST['reported_user'];
$report_checked = $_POST['report'];
$reply_postID = $_POST['reply_postID'];
$pageId = $_POST['page_post'];
$sql= "INSERT INTO reports_reply (reported_user, reported_email, reported_content, report, reply_postId, page_post) 
VALUES ('$reported_user', '$reported_email', '$reported_content', '$report_checked', '$reply_postID', '$pageId')";

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
<?php
session_start();
include("db.php");

$member_email = $_SESSION['email']; //unique email as id
$replyId = $_POST['reply_id'];
$type = $_POST['type'];
// Check entry within table
$query = "SELECT COUNT(*) AS cntpost FROM reply_likeunlike WHERE member_email = '$member_email' AND reply_id = '$replyId'";
$result = mysqli_query($con,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['cntpost'];
if($count == 0){
    $insertquery = "INSERT INTO reply_likeunlike (member_email, reply_id, type) VALUES ('$member_email','$replyId','$type')";
    mysqli_query($con,$insertquery);
}
else {
	$query2 = "SELECT * FROM reply_likeunlike WHERE member_email = '$member_email' AND reply_id = '$replyId'";
	$result2 = mysqli_query($con,$query2);
    $fetchtype = mysqli_fetch_array($result2);
    $prev_type = $fetchtype['type'];
	if ($type == $prev_type) {
		$updatequery = "UPDATE reply_likeunlike SET type = '-1' WHERE member_email = '$member_email' AND reply_id = '$replyId'";
    mysqli_query($con,$updatequery);
	}
	else{
    $updatequery2 = "UPDATE reply_likeunlike SET type = '$type' WHERE member_email = '$member_email' AND reply_id = '$replyId'";
    mysqli_query($con,$updatequery2);
}
}

// count numbers of like and unlike in post
$query = "SELECT COUNT(*) AS cntLike FROM reply_likeunlike WHERE type = 1 AND reply_id = '$replyId'";
$result = mysqli_query($con,$query);
$fetchlikes = mysqli_fetch_array($result);
$reply_totalLikes = $fetchlikes['cntLike'];

$query = "SELECT COUNT(*) AS cntUnlike FROM reply_likeunlike WHERE type = 0 AND reply_id = '$replyId'";
$result = mysqli_query($con,$query);
$fetchunlikes = mysqli_fetch_array($result);
$reply_totalUnlikes = $fetchunlikes['cntUnlike'];

//Assign a new value if type is not same with previous for easy color removal in jquery
    $query2 = "SELECT * FROM reply_likeunlike WHERE member_email = '$member_email' AND reply_id = '$replyId'";
	$result2 = mysqli_query($con,$query2);
    $fetchtype = mysqli_fetch_array($result2);
    $prev_type = $fetchtype['type'];
$NewType = '';
	if ($type !== $prev_type) {
	$NewType = -1;
	}
	


$return_arr = array("Rliked"=>$reply_totalLikes,"Runliked"=>$reply_totalUnlikes,"cancel"=>$NewType);
echo json_encode($return_arr);
?>
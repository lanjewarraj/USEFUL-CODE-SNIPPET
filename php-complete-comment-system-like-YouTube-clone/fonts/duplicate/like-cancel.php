<?php
session_start();
include("db.php");

$member_email = $_SESSION['email']; //unique email as id
$commentId = $_POST['comment_id'];
$type = $_POST['type'];
// Check entry within table
$query = "SELECT COUNT(*) AS cntpost FROM like_unlike WHERE member_email = '$member_email' AND comment_id = '$commentId'";
$result = mysqli_query($con,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['cntpost'];
if($count == 0){
    $insertquery = "INSERT INTO like_unlike (member_email, comment_id, type) VALUES ('$member_email','$commentId','$type')";
    mysqli_query($con,$insertquery);
}
else {
	$query2 = "SELECT * FROM like_unlike WHERE member_email = '$member_email' AND comment_id = '$commentId'";
	$result2 = mysqli_query($con,$query2);
    $fetchtype = mysqli_fetch_array($result2);
    $prev_type = $fetchtype['type'];
	if ($type == $prev_type) {
		$updatequery = "UPDATE like_unlike SET type = '-1' WHERE member_email = '$member_email' AND comment_id = '$commentId'";
    mysqli_query($con,$updatequery);
	}
	else{
    $updatequery2 = "UPDATE like_unlike SET type = '$type' WHERE member_email = '$member_email' AND comment_id = '$commentId'";
    mysqli_query($con,$updatequery2);
}
}

// count numbers of like and unlike in post
$query = "SELECT COUNT(*) AS cntLike FROM like_unlike WHERE type = 1 AND comment_id = '$commentId'";
$result = mysqli_query($con,$query);
$fetchlikes = mysqli_fetch_array($result);
$totalLikes = $fetchlikes['cntLike'];

$query = "SELECT COUNT(*) AS cntUnlike FROM like_unlike WHERE type = 0 AND comment_id = '$commentId'";
$result = mysqli_query($con,$query);
$fetchunlikes = mysqli_fetch_array($result);
$totalUnlikes = $fetchunlikes['cntUnlike'];

//Assign a new value if type is not same with previous for easy color removal in jquery
    $query2 = "SELECT * FROM like_unlike WHERE member_email = '$member_email' AND comment_id = '$commentId'";
	$result2 = mysqli_query($con,$query2);
    $fetchtype = mysqli_fetch_array($result2);
    $prev_type = $fetchtype['type'];
$NewType = '';
	if ($type !== $prev_type) {
	$NewType = -1;
	}
	


$return_arr = array("liked"=>$totalLikes,"unliked"=>$totalUnlikes,"cancel"=>$NewType);
echo json_encode($return_arr);
?>
<?php
    $con = new mysqli('localhost', 'root', '', 'email_confirmations');
	
	   function generateNewString($len = 10) {
		$token = "poiuztrewqasdfghjklmnbvcxy1234567890";
		$token = str_shuffle($token);
		$token = substr($token, 0, $len);

		return $token;
	}  

	function redirectToLoginPage() {
		header('Location: login.php');
		exit();
	}
	
	
	function redirectToIndexPage() {
		
   header('Location: index.php?LoginSuccess');
   exit();
}


	function getUsersData($id)
	{     
	      $array = array(); 
		  $con = new mysqli('localhost', 'root', '', 'email_confirmations');
	      $sql = $con->query("SELECT * FROM users WHERE id ='$id'");
	      while ($row = mysqli_fetch_assoc($sql))
	      {
          
		  $array['id'] = $row['id'];
		   $array['name'] = $row['name'];
		    $array['username'] = $row['username'];
			  $array['email'] = $row['email'];
			   $array['earning'] = $row['earning'];
		  	
	      }
		  return $array;
	
	} 
	
	function getId($email)
	
	{
	  $con = new mysqli('localhost', 'root', '', 'email_confirmations');

	  $sql = $con->query("SELECT * FROM users WHERE email ='$email'");
	  while($row= mysqli_fetch_assoc($sql))
	  {
	    return $row['id'];
	  	  
	  }
	
	}
	 
	 function count_comment($connect, $comment_id)
{
 $query = "
 SELECT * FROM tbl_reply 
 WHERE comment_id = '".$comment_id."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}	
	
?>



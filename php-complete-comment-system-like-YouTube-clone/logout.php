<title>Log Out</title><?php

//logout.php

session_start();

session_destroy();

header('location: index.php');

?>

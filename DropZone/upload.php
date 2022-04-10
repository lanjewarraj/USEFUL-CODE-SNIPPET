<?php 
if(!empty($_FILES)){ 
    // Include the database configuration file 
    require 'dbConfig.php'; 
     
    // File path configuration 
    $uploadDir = "uploads/"; 
    $fileName = basename($_FILES['file']['name']); 
    $uploadFilePath = $uploadDir.$fileName; 
     
    // Upload file to server 
    if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath)){ 
        // Insert file information in the database 
        $insert = $db->query("INSERT INTO dropzone_files (file_name, uploaded_on) VALUES ('".$fileName."', NOW())"); 
    } 
} 
?>
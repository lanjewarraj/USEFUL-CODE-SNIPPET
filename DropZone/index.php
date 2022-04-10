<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
</head>

<body>
<form action="upload.php" class="dropzone"></form>
<button id="startUpload">UPLOAD</button>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
//Disabling autoDiscover
Dropzone.autoDiscover = false;

$(function() {
    //Dropzone class
    var myDropzone = new Dropzone(".dropzone", {
        url: "upload.php",
        paramName: "file",
        maxFilesize: 2,
        maxFiles: 10,
        acceptedFiles: "image/*",
        autoProcessQueue: false,
        
    });
    $('#startUpload').click(function(){           
        myDropzone.processQueue();
    });
});
</script>
</body>

</html>
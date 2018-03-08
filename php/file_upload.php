<?php
//This holds the correct directory that we wish to send a file
$uploadFile = 'ServerFile.txt';
if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFile))
{
    //if file gets added then alert informs user
    $successupload = "The file was successfully uploaded!";
    echo"$successupload";
    //echo"<script type='text/javascipt'>alert('$successupload');</script>";
}
elseif($_FILES['userfile']['error']==UPLOAD_ERR_NO_FILE)
{
    //informs user a file must be uploaded first
    $nofile = "No file attached. Attach a file and try again.";
    echo"<script type='text/javascipt'>alert('$nofile');</script>";
}
else {
    //if the file can't be uploaded
    echo "File Upload Error\n Debugging info:";
    print_r($_FILES);
}
?>
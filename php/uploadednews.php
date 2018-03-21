<?php
//This holds the correct directory that we wish to send a file and then cancatonates the
    //orig file name so that the file will appear as the file it was uploaded as
$uploadFile = '../news/' . $_FILES['userfile']['name'];
/*this isn't like O'Donnell's setup - it made more sense like this to me.*/
//make sure user uploaded a file first
if($_FILES['userfile']['error']==UPLOAD_ERR_NO_FILE)
{
    //informs user a file must be uploaded first
    $nofile = "No file attached. Attach a file and try again.";
    echo"$nofile";
}
//checks to see if the file is already in the resources and if it is, replaces it
elseif(file_exists($uploadFile))
{
    move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFile);
    $replace = "The file was successfully replaced!";
    echo"$replace";
}
//if it doesn't exist we add it
else if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFile))
{
    //if file gets added then alert informs user
    $successupload = "The file was successfully uploaded!";
    echo"$successupload";
}
//generic default error message - if something goes terribly wrong!
else {
    //if the file can't be uploaded
    echo "File Upload Error\n Debugging info:";
    print_r($_FILES);
}
?>
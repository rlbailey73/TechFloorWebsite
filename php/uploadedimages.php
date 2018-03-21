<?php
//directs a file to the correct folder keeping the name the file already has
$uploadpic = '../images/' . $_FILES['userpic']['name'];

/*this isn't like O'Donnell's setup - it made more sense like this to me.*/
//make sure user uploaded a file first
if($_FILES['userpic']['error']==UPLOAD_ERR_NO_FILE)
{
    //informs user a file must be uploaded first
    $nofile = "No file attached. Attach a picture file and try again.";
    echo"$nofile";
}
//if user has uploaded something we go into more checks
else {

    //this gets information from the temporary file such as width height and type
    $image_info = getimagesize($_FILES['userpic']['tmp_name']);
    /**BECKYYYY- code is messy bc we get an extra error message here so now we have extra stuff. jody might be mad so we neeed to discuss an alternative maybe*/
    //store the image width (first thing in array?)
    $img_width = $image_info[0];
    //store the image height (second thing in the array?)
    $img_height = $image_info[1];
    //store the image type (third thing in the array?)
    $img_type = $image_info[2];

    /*if the user has a picture file to be uploaded we check to see if it something we
    accept (png, jpeg, gif). If it isnt, we output a message saying its invalid*/
    if ($img_type != IMAGETYPE_PNG && $img_type != IMAGETYPE_JPEG) {
        echo "Picture files are only accepted as .PNG, .JPEG, and .GIF";
    } //checks to see if the picture has already been uploaded and if it has will tell the user that its been replaced
    elseif (file_exists($uploadpic)) {
        move_uploaded_file($_FILES['userpic']['tmp_name'], $uploadpic);
        $replace = "The picture file was successfully replaced!";
        echo "$replace";
    } //if it doesn't exist already then we add it
    elseif (move_uploaded_file($_FILES['userpic']['tmp_name'], $uploadpic)) {
        echo "<p>The picutre file was successfully uploaded </p>";
    }
    //if something really bad happens we get the error message
    else{
        echo "File Upload Error \n Debugging info:";
        print_r($_FILES);
    }
}




/*//This holds the correct directory that we wish to send a file and then cancatonates the
//orig file name so that the file will appear as the file it was uploaded as
$uploadFile = '../image/' . $_FILES['userpic']['name'];

if (file_exists($uploadfile)) {
    $message = "The file was replaced successfully";
} else {
    $message = "The file was successfully uploaded";
}

$image_info =
    getimagesize($_FILES['userpic']['tmp_name']);
$image_width = $image_info[0];
$image_height = $image_info[1];
$image_type = $image_info[2];
if ($image_type != IMAGETYPE_JPEG && $image_type !=
    IMAGETYPE_GIF && $image_type != IMAGETYPE_PNG) {
    echo "Only jpeg, gif, and png files are supported.  Please try again.";
    print_r($image_info);
} else if ($image_height > 120 OR $image_width > 120) {
    echo "Logo files must be smaller than 120px by 120px.";
} else if (move_uploaded_file($_FILES['userpic']['tmp_name'],
    $uploadfile)) {
    echo "<p>$message.</p>";
} else if ($_FILES['userpic']['error'] == UPLOAD_ERR_NO_FILE) {
    echo "<p>Please choose a file first and then try again...</p>";
} else if ($_FILES['userpic']['size'] > 1000000) {
    echo "<p>Please choose a file smaller than 1MB and then try again...</p>";
} else {
    echo "File Upload Error\n Debugging info:";
    print_r($_FILES);
}
*/
?>
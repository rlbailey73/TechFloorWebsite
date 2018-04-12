<?php
$title = "Uploading Images";
require '../view/headerinclude.php';
?>
<div class="index-template text-white" >
    <?php
        /*this isn't like O'Donnell's setup - it made more sense like this to me.*/
        //make sure user uploaded a file first and has a folder type selected
        if($_FILES['userpic']['error']==UPLOAD_ERR_NO_FILE || $_POST['picFolder']=="")
        {
            //informs user a file must be uploaded first
            echo "Make sure you specified which folder and selected a picture";

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

            //this indicates the folder selected by the user that the pic needs to be placed in
            $img_folder = $_POST['picFolder'];
            //we need to create the file path based on the selected
            if($img_folder=="L")
            {
                //directs a file to the correct folder keeping the name the file already has
                $uploadpic = '../images/TechfloorLife/' . $_FILES['userpic']['name'];
                $picLocation = "TechfoorLife";//added because outputing $img_folder was just a letter
            }
            else if($img_folder=="F")
            {
                //directs a file to the correct folder keeping the name the file already has
                $uploadpic = '../images/Functional/' . $_FILES['userpic']['name'];
                $picLocation = "Functional";
            }
            else
            {
                $uploadpic = '../images/' . $_FILES['userpic']['name'];
                $picLocation = "Defaulted to images folder. Breanna coded incorrectly ~ probs wanna check this out!";
            }

            /*if the user has a picture file to be uploaded we check to see if it something we
            accept (png, jpeg, gif). If it isnt, we output a message saying its invalid*/
            if ($img_type != IMAGETYPE_PNG && $img_type != IMAGETYPE_JPEG && $img_type !=IMAGETYPE_GIF) {
                echo "Picture files are only accepted as .PNG, .JPEG, and .GIF";
            } //checks to see if the picture has already been uploaded and if it has will tell the user that its been replaced
            elseif (file_exists($uploadpic)) {
                move_uploaded_file($_FILES['userpic']['tmp_name'], $uploadpic);
                $replace = "The picture file was successfully replaced!";
                echo "$replace";
            } //if it doesn't exist already then we add it
            elseif (move_uploaded_file($_FILES['userpic']['tmp_name'], $uploadpic)) {
                echo "<p>The picture file was successfully uploaded into $picLocation</p>";
            }
            //if something really bad happens we get the error message
            else{
                echo "File Upload Error \n Debugging info:";
                print_r($_FILES);
            }
        }
    ?>
    <a href="../view/admin.php"><button type = "button" >Back to admin page</button></a>
</div>
<?php
require '../view/footerinclude.php';
?>

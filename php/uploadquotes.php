<?php
$title = "Uploading Quotes";
require '../view/headerinclude.php';
?>
<div class="index-template text-white" >
    <?php
    //This holds the correct directory that we wish to send a file and then cancatonates the
    //orig file name so that the file will appear as the file it was uploaded as
    $uploadQuoteFile = '../DataFiles/quotes.txt';//. $_FILES['quotefile']['name'];
                                                //the above is used if we want original file name
    //make sure user uploaded a file
    //if no file uploaded display a message.
    if($_FILES['quotefile']['error']==UPLOAD_ERR_NO_FILE)
    {
        //informs user a file must be uploaded first
        $nofile = "No file attached. Attach a file and try again.";
        echo"$nofile";
    }
    //checks to see if the file is already in the resources and if it is, replaces it
    elseif(file_exists($uploadQuoteFile))
    {
        move_uploaded_file($_FILES['quotefile']['tmp_name'], $uploadQuoteFile);
        $replace = "The file was successfully replaced!";
        echo"$replace";
    }
    //if it doesn't exist we add it
    else if(move_uploaded_file($_FILES['quotefile']['tmp_name'], $uploadQuoteFile))
    {
        //if file gets added then alert informs user
        $successupload = "The file was successfully uploaded!";
        echo"$successupload";
    }
    //checks to see if the files are of a specific type before uploading them.
    else if($_FILES['quotefile']['type'])
    {
        //informs user a file must be uploaded first
        $nofile = "No file attached. Attach a file and try again.";
        echo"$nofile";
    }
    //generic default error message
    else {
        //if the file can't be uploaded
        echo "File Upload Error\n Debugging info:";
        print_r($_FILES);
    }
    ?>
    <a href="../view/admin.php"><button type = "button" >Back to admin page</button></a>
</div>
<?php
require '../view/footerinclude.php';
?>


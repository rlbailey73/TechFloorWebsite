<?php
$title = "Uploading News";
require '../view/headerinclude.php';
?>

<div class="index-template text-white" >
    <?php
    //path to the file that holds the names
    $list = "../datafiles/email_list.txt";
    //gets the contents and puts into something we can add to
    $thislist = file_get_contents($list);
    //adds the users information using POST method
    $thislist .= $_POST["fName"] ." " . $_POST["lName"] . " <" . $_POST["email"] . ">\n";
    file_put_contents($list, $thislist);
    ?>
    <a href="../view/signup.php"><button type = "button" >Back to Sign in page</button></a>
</div>

<?php
require '../view/footerinclude.php';
?>

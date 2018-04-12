<!--
Purpose: This is called from the button from signup.php it uses POST methods to add a person's name and email to our text file
link used to add items from form to txt file: http://php.net/manual/en/function.file-put-contents.php
-->

<?php
$title = "Signup Results";
require '../view/headerinclude.php';
require_once '../controller/controller.php'
?>

<div class="index-template text-white"  >

    <?php
        //[]=array('Bre', 'Greggs', 'anna41@gmail.com');

        echo "You have been successfully added";
        echo "<h3>The following are also memebers of TechFloorr</h3>";
        //outputs the members
       // echo '<li>';
        foreach ($signupsheet as $mem)
        {
           echo "$mem[2] $mem[0] $mem[1]";
        }
        //echo '</li>';
    ?>
    <!--button to return the signup page-->
    <a href="../controller/controller.php?action=SignUp"><button type = "button" >Back to Sign in page</button></a>
</div>

<?php
require '../view/footerinclude.php';
?>

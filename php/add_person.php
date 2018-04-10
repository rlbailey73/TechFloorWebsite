<!--
Purpose: This is called from the button from signup.php it uses POST methods to add a person's name and email to our text file
link used to add items from form to txt file: http://php.net/manual/en/function.file-put-contents.php
-->

<?php
$title = "Signup Results";
require '../view/headerinclude.php';
?>

<div class="index-template text-white"  >
    <?php
        //get the post values(keynames) and stores them into variables **adds layer of protection
        $firstName = $_POST['fName'];
        $lastName = $_POST['lName'];
        $email = $_POST['email'];

        //validation ensures that first and last name have values and email is valid
        if(empty($firstName))
        {
            echo "<h3>Sign up failed. You forgot your first name</h3>";
        }
        else if (empty($lastName))
        {
            echo "<h3>Sign up failed. You forgot your last name</h3>";
        }
        else if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            echo "<h3>Sign failed. Make sure that you have entered a proper email</h3>";
        }
        else //only adds a person if they fill out to the correct standards
        {
            //this creates the file initially if it doesn't exits allowing for appending at the end and reading
            $file = fopen('../datafiles/email_list.csv', 'ab');
            //adds the details to the file
            fputcsv($file, array($firstName, $lastName, $email));
            //closes the file
            fclose($file);
            echo "<h3>YAY! We have added you successfully to the email list!</h3>";
        }
    ?>
    <!--button to return the signup page-->
    <a href="../view/signup.php"><button type = "button" >Back to Sign in page</button></a>
</div>

<?php
require '../view/footerinclude.php';
?>

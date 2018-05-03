<?php
	$title = "Control Panel - Add User";
	require '../security/headerInclude.php';
?>

    <h1>Add User</h1>

    <form action="../security/index.php?action=SecurityProcessUserAddEdit" method="post">

        First Name*: <input type="text" name="FirstName" size="20" value="" autofocus required ><br/>

        Last Name*: <input type="text" name="LastName" size="20" value=""><br/>

        User Name*: <input type="text" name="UserName" size="20" value="" required ><br/>

        Password*: <input type="password" name="Password" size="20" value=""><br/>

        Email*: <input type="text" name="Email" size="20" value=""><br/>

        <br/>

        <input type="submit" value="Submit" />

    </form>

<?php
	require '../security/footerInclude.php';
?>

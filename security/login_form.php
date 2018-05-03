<?php
	$title = "Login";
	require '../security/headerInclude.php';
?>
    <h1>Login</h1>

    <form action="../security/index.php?action=SecurityProcessLogin" method="post">

        Username: <input type="text" name="username" /><br/>
        Password: <input type="password" name="password" /><br/><br/>
        <input type="hidden" name="RequestedPage" value="<?php echo $_GET['RequestedPage'] ?>" />

        <input type="submit" value="Submit"/>

        <?php
            if (isset($_GET['LoginFailure'])) {
                echo '<p/><h4> Invalid Username or Password.  Please try again.</h4>';
            }
        ?>

    </form>

<?php
	require '../security/footerInclude.php';
?>
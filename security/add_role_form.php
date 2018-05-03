<?php
	$title = "Control Panel - Add Role";
	require '../security/headerInclude.php';
?>

	<h2>Add Role</h2>

	<form action="../security/index.php?action=SecurityProcessRoleAddEdit" method="post">

		Name: <input type="text" name="Name" size="20" value="" autofocus required ><br/>
		Description: <input type="text" name="Description" size="50" value=""><br/>
		<br/>

		<input type="submit" value="Submit" />

	</form>

<?php
	require '../security/footerInclude.php';
?>


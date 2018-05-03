<?php include '../view/headerInclude.php'; ?>

    <script type="text/javascript" src="attributes.js"></script>

		<h1>Control Panel</h1>

		<?php if (userIsAuthorized("SecurityManageUsers")) {  ?>
				<a href="../security/index.php?action=SecurityManageUsers">Manage Users</a> &nbsp;
		<?php } 
			if (userIsAuthorized("SecurityManageFunctions")) {  ?>
				<a href="../security/index.php?action=SecurityManageFunctions">Manage Functions</a> &nbsp;
		<?php } 
			if (userIsAuthorized("SecurityManageRoles")) {  ?>
				<a href="../security/index.php?action=SecurityManageRoles">Manage Roles</a> &nbsp;
		<?php }
			if (loggedIn()) {  ?>
				<a href="../security/index.php?action=SecurityLogOut">Log Out</a>
		<?php } else { 
				echo "<a href=\"../security/index.php?action=SecurityLogin&RequestedPage=" . urlencode($_SERVER['REQUEST_URI']) . "\">Log In</a>";
		} ?>
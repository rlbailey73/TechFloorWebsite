<?php
	$title = "Control Panel - Manage Users";
	require '../security/headerInclude.php';
?>

<h2>Manage Users</h2>

<?php
    if (userIsAuthorized("SecurityUserAdd")) {
        echo "<a href=\"../security/index.php?action=SecurityUserAdd\">Add User</a><p/>";
    }
?>
    <form action="../security/index.php?action=SecurityUserDelete" method="post">
        <table border>
            <tr>
                <td><b>First Name</b></td>
                <td><b>Last Name</b></td>
                <td><b>User Name</b></td>
                <td><b>Email</b></td>
                <td></td>
                <td></td>
            </tr>
	<?php
            $j = 0;
            foreach ($results as $record) {
                $firstName = $record["FirstName"];
                $lastName = $record["LastName"];
                $userName = $record["UserName"];
                $email = $record["Email"];
                $user_ID = $record["UserID"];

                echo "<tr>";
                echo "<td>$firstName</td> <td>$lastName</td> <td>$userName</td> <td>$email</td>";
                if (userIsAuthorized("SecurityUserEdit")) {
                    echo "<td><a href=\"../security/index.php?action=SecurityUserEdit&id=$user_ID\">Edit</a></td>";
                } else {
                    echo "<td></td>";
                }
                if (userIsAuthorized("SecurityUserDelete")) {
                    echo "<td><input type=\"checkbox\" name=\"record$j\" value=\"$user_ID\"/></td>";
                } else {
                    echo "<td></td>";
                }
                echo "</tr>\n";

                ++$j;
            }
		
	?>

        </table>
        <br/>

        <input type="hidden" name="numListed" value="<?php echo count($results); ?>"/>
        <?php
            if (userIsAuthorized("SecurityUserDelete")) {
                echo "<input type=\"submit\" value=\"Delete Selected\"/>";
            }
        ?>
    </form>
<?php
	require '../security/footerInclude.php';
?>

<?php
	$title = "Control Panel - Modify User";
	require '../security/headerInclude.php';
?>

	<?php
                $hasnt_attributes = array();
                $has_attributes = array();
		$i = 0;
		foreach ($hasAttrResults as $row) {
			$has_attributes[$i]["id"] = $row["RoleID"];
			$has_attributes[$i]["name"] = $row["Name"];
			++$i;
		}

		$i = 0;
		foreach ($hasNotAttrResults as $row) {
			$hasnt_attributes[$i]["id"] = $row["RoleID"];
			$hasnt_attributes[$i]["name"] = $row["Name"];
			++$i;
		}

		$select1 = "<select id=\"hasAttributes\" name=\"hasAttributes[]\" size=\"10\" style=\"width:200px;\" multiple=\"multiple\">\n";
		for($i = 0; $i < count($has_attributes); ++$i) {
			$attrid = $has_attributes[$i]["id"];
			$attrname = $has_attributes[$i]["name"];
			$select1 .= "<option value=\"$attrid\">$attrname</option>\n";
		}
		$select1 .= "</select>";

		$select2 = "<select id=\"hasntAttributes\" name=\"hasntAttributes[]\" size=\"10\" style=\"width:200px;\" multiple=\"multiple\">\n";
		for($i = 0; $i < count($hasnt_attributes); ++$i) {
			$attrid = $hasnt_attributes[$i]["id"];
			$attrname = $hasnt_attributes[$i]["name"];
			$select2 .= "<option value=\"$attrid\">$attrname</option>\n";
		}
		$select2 .= "</select>";
	?>

    <h2>Modify User</h2>

    <form action="../security/index.php?action=SecurityProcessUserAddEdit" method="post" onsubmit="selectAll('hasAttributes')">

        <input type="hidden" name="UserID" value="<?php echo $id; ?>"/>

        First Name: <input type="text" name="FirstName" size="20" value="<?php echo $firstName; ?>" autofocus required ><br/>

        Last Name: <input type="text" name="LastName" size="20" value="<?php echo $lastName; ?>"><br/>

        User Name: <input type="text" name="UserName" size="20" value="<?php echo $userName; ?>"><br/>

        Password: <input type="password" name="Password" size="20" value=""> <br/>

        Email: <input type="text" name="Email" size="20" value="<?php echo $email; ?>"><br/>

        <table>

            <tr>
                <td>
                    <b>Is</b><br/>
                    <?php echo $select1; ?>
                </td>

                <td>
                    <input type="button" value=">>" onclick="swap('hasAttributes','hasntAttributes')"><br/>
                    <br/>
                    <input type="button" value="<<" onclick="swap('hasntAttributes','hasAttributes')"><br/>
                </td>

                <td>
                    <b>Is Not</b><br/>
                    <?php echo $select2; ?>
                </td>
            </tr>

        </table>

        <br/>

        <input type="submit" value="Submit" />

    </form>

<?php
	require '../security/footerInclude.php';
?>

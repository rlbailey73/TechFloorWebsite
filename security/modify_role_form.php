<?php
	$title = "Control Panel - Modify Role";
	require '../security/headerInclude.php';
?>
<?php
    $hasnt_attributes = array();
    $has_attributes = array();
    $i = 0;
    foreach ($hasAttrResults as $row) {
        $has_attributes[$i]["id"] = $row["FunctionID"];
        $has_attributes[$i]["name"] = $row["Name"];
        ++$i;
    }

    $i = 0;
    foreach ($hasNotAttrResults as $row) {
        $hasnt_attributes[$i]["id"] = $row["FunctionID"];
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
        <h2>Modify Role</h2>

        <form action="../security/index.php?action=SecurityProcessRoleAddEdit" method="post" onsubmit="selectAll('hasAttributes')">
            <input type="hidden" name="RoleID" value="<?php echo $id; ?>"/>
            Name:  <input type="text" name="Name" size="20" value="<?php echo $name; ?>" autofocus required  /><br/>
            Description: <input type="text" name="Description" size="50" value="<?php echo $desc; ?>" />
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

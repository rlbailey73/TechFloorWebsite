<?php
	$title = "Control Panel - Manage Functions";
	require '../security/headerInclude.php';
?>
            <h2>Manage Functions</h2>
    <?php
        if (userIsAuthorized("SecurityFunctionAdd")) {
            echo "<a href=\"../security/index.php?action=SecurityFunctionAdd\">Add Function</a><p/>";
        }
    ?>
    <form action="../security/index.php?action=SecurityFunctionDelete" method="post">

        <table border>
            <tr>
                <td><b>Name</b></td> <td><b>Description</b></td> <td></td> <td></td>
            </tr>
            <?php
                $j = 0;
                foreach ($results as $record) {
                    $name = $record["Name"];
                    $desc = $record["Description"];
                    $function_ID = $record["FunctionID"];

                    echo "<tr>";
                    echo "<td>$name</td><td>$desc</td>";
                    if (userIsAuthorized("SecurityFunctionEdit")) {
                        echo "<td><a href=\"../security/index.php?action=SecurityFunctionEdit&id=$function_ID\">Edit</a></td>";
                    } else {
                        echo "<td></td>";
                    }
                    if (userIsAuthorized("SecurityFunctionDelete")) {
                        echo "<td><input type=\"checkbox\" name=\"record$j\" value=\"$function_ID\"/></td>";
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
            if (userIsAuthorized("SecurityFunctionDelete")) {
                echo "<input type=\"submit\" value=\"Delete Selected\"/>";
            }
        ?>
        </form>
<?php
	require '../security/footerInclude.php';
?>
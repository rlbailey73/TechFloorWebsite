<?php
	$title = "Control Panel - Modify Function";
	require '../security/headerInclude.php';
?>
    <h2>Modify Function</h2>

    <form action="../security/index.php?action=SecurityProcessFunctionAddEdit" method="post">

            <input type="hidden" name="FunctionID" value="<?php echo $id; ?>"/>

            Name:  <input type="text" name="Name" size="20" value="<?php echo $name; ?>" autofocus required  /><br/>
            Description: <input type="text" name="Description" size="50" value="<?php echo $desc; ?>" />

            <br/>

            <input type="submit" value="Submit" />

    </form>
	
<?php
	require '../security/footerInclude.php';
?>

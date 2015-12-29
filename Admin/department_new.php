<?php
$name = "";
$description = "";

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$description = $_POST['description'];
	
	$sql = "insert into department(name, description) values('".mysql_real_escape_string(strip_tags($name))."', '".mysql_real_escape_string(strip_tags($description))."')";
	if(mysql_query($sql))
	{
		print '<span class="success">Data Saved</span>';
		$name = "";
		$description = "";
	}
	else
	{
		print '<span class="error">'.mysql_error().'</span>';
	}
}

?>
<form method="post" action="">
<fieldset>
<legend>Department New</legend>
Name<br />
<input type="text" name="name" value="<?php print $name; ?>" required /><br />
<br />
Description<br />
<textarea name="description"><?php print $description; ?></textarea><br />
<br />
<input type="submit" name="submit" value="Submit"/>

</fieldset>
</form>
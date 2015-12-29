<?php
$name = "";

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	
	$sql = "insert into country(name) values('".mysql_real_escape_string(strip_tags($name))."')";
	if(mysql_query($sql))
	{
		print '<span class="success">Data Saved Successfully</span>';
		$name = "";
	}
	else
	{
		print '<span class="error">'.mysql_error().'</span>';
	}
}

?>
<form method="post" action="">
<fieldset>
<legend>Country New</legend>
Name<br><input type="text" name="name" value="<?php print $name; ?>" required /><br /><br />
<input type="submit" name="submit" value="Submit" />
</fieldset>
</form>
<?php
$name = "";

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	
	$sql = "update country set name = '".mysql_real_escape_string(strip_tags($name))."' where id = ".$_GET['id'];
	if(mysql_query($sql))
	{
		print '<span class="success">Data Saved Successfully</span>';
	}
	else
	{
		print '<span class="error">'.mysql_error().'</span>';
	}
}
else
{
	$sql = "select * from country where id = ".$_GET['id'];
	$r = mysql_query($sql);
	while($s = mysql_fetch_row($r))
	{
		$name = $s[1];
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
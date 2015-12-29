<?php
$name = "";
$description = "";

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$description = $_POST['description'];
	
	$sql = "update department set name = '".ms($name)."', description = '".ms($description)."' where id = ".$_GET['id'];
	if(mysql_query($sql))
	{
		print '<span class="success">Data Saved</span>';
		
		print '<script language="JavaScript" type="text/javascript">
		makeRedirect(\''.$_GET['returnPage'].'\');
		</script>';

	}
	else
	{
		print '<span class="error">'.mysql_error().'</span>';
	}
}
else
{
	$sql = "select * from department where id = ".$_GET['id'];
	$r = mysql_query($sql);
	while($s = mysql_fetch_row($r))
	{
		$name = $s[1];
		$description = $s[2];
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
<?php
$name = "";
$countryId = "";

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$countryId = $_POST['country'];
	
	$sql = "insert into city(name, countryId) values('".mysql_real_escape_string(strip_tags($name))."', ".mysql_real_escape_string(strip_tags($countryId)).")";
	if(mysql_query($sql))
	{
		print '<span class="success">Data Saved Successfully</span>';
		$name = "";
		$countryId = "";
	}
	else
	{
		print '<span class="error">'.mysql_error().'</span>';
	}
}

?>
<form method="post" action="">
<fieldset>
<legend>City New</legend>
Name<br><input type="text" name="name" value="<?php print $name; ?>" required />
<br />
<br />
Country<br />
<select name="country">
<option value="0">Select</option>
<?php
$sql = "select * from country";
$r = mysql_query($sql);
while($s = mysql_fetch_row($r))
{
	print '<option value="'.$s[0].'">'.$s[1].'</option>';
}
?>
</select>
<br />
<br />
<input type="submit" name="submit" value="Submit" />
</fieldset>
</form>
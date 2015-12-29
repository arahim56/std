<?php
$name = "";
$department = "0";
$fee = "";
$duration = "";
$link = "";
$sylebus["name"] = "";
$description = "";
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$department = $_POST['department'];
	$fee = $_POST['fee'];
	$duration = $_POST['duration'];
	$link = $_POST['link'];
	$sylebus = $_FILES["sylebus"];
	$description = $_POST['description'];
	
	$a = explode(".", $sylebus["name"]);
	$ext = $a[count($a) -1];
	
	$sql = "insert into course
	(name, departmentId, fee, duration, link, sylebus, description) 
	values('".ms($name)."', ".ms($department).", ".ms($fee).", ".ms($duration).", 
	'".ms($link)."', '".ms($ext)."', '".ms($description)."')";
	if(mysql_query($sql))
	{
		
		$sp = $sylebus['tmp_name'];
		$dp = "Sylebus/".mysql_insert_id().".".$ext;
		move_uploaded_file($sp, $dp);
		print '<span class="success">Data Saved</span>';
		$name = "";
		$department = "0";
		$fee = "";
		$duration = "";
		$link = "";
		$sylebus["name"] = "";
		$description = "";
	}
	else
	{
		print '<span class="error">'.mysql_error().'</span>';
	}
}
?>
<form method="post" enctype="multipart/form-data" action="">
<fieldset>
<legend>Course New</legend>
Name<br><input type="text" name="name" value="<?php print $name; ?>" required /><br /><br />
Department<br />
<select name="department" required >
<option value="0">Select</option>
<?php
$sql = "select id, name from department";
$r = mysql_query($sql);
while($s = mysql_fetch_row($r))
{
	if($s[0] == $department)
	{
		print '<option value="'.$s[0].'" selected>'.$s[1].'</option>';
	}
	else
	{
		print '<option value="'.$s[0].'" >'.$s[1].'</option>';
	}
}
?>
</select><br><br>
Fee<br><input type="text" name="fee" value="<?php print $fee; ?>" required  /><br /><br />
Duration<br><input type="text" name="duration" value="<?php print $duration; ?>" required  /><br /><br />
Link<br><input type="text" name="link" value="<?php print $link; ?>" /><br /><br />
Sylebus<br><input type="file" name="sylebus" required  /><br /><br />
Description<br />
<textarea name="description"><?php print $description; ?></textarea><br />
<br />
<input type="submit" name="submit" value="Submit" />
</fieldset>
</form>
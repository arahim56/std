<?php
$student = "0";
$image["name"] = "";
$description = "";

if(isset($_POST['submit']))
{
	$student = $_POST['student'];
	$image = $_FILES['image'];
	$description = $_POST['description'];
	
	$a = explode(".", $image["name"]);
	$ext = $a[count($a) - 1];
	
	$sql = "insert into studentimage(studentId, image, date, description) values
			(".ms($student).", '".ms($ext)."', '".date("Y-m-d")."', 
			'".ms($description)."')";
	if(mysql_query($sql))
	{
		$sp = $image['tmp_name'];
		$dp = "StudentImages/".mysql_insert_id().".".$ext;
		move_uploaded_file($sp, $dp);
		print '<span class="success">Data Saved</span>';
		$student = "0";
		$image["name"] = "";
		$description = "";
	}
	else
	{
		print '<span class="error">'.mysql_error().'</span>';
	}
}
?>
<form method="post" enctype="multipart/form-data" action="">
Student<br>
<select name="student" required>
<option value="0">Select</option>
<?php
$sql = "select id, email from student";
$r = mysql_query($sql);
while($s = mysql_fetch_row($r))
{
	print '<option value="'.$s[0].'">'.$s[1].'</option>';
}
?>
</select><br /><br />
Select Image<br />
<input type="file" name="image" required /><br /><br />
Description<br />
<textarea name="description" required><?php print $description; ?></textarea><br>
<br>
<input type="submit" name="submit" value="Submit"/>
</form>
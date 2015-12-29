<?php
$name = "";
$contact = "";
$email = "";
$dateofbirth = "";
$gender = "";
$address = "";
$city = "0";
$cv["name"] = "";
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$dateofbirth = $_POST['dateofbirth'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$cv = $_FILES['cv'];
	
	$a = explode(".", $cv["name"]);
	$ext = $a[count($a) - 1];
	
	$sql = "insert into student(name, contact, email, dateofbirth, gender, 
					address, cityId, cv) values(
					'".ms($name)."', '".ms($contact)."', '".ms($email)."', 
					'".ms($dateofbirth)."', ".ms($gender).", '".ms($address)."',
					".ms($city)." , '".ms($ext)."')";
					
	if(mysql_query($sql))
	{
		$sp = $cv['tmp_name'];
		$dp = "CVS/".mysql_insert_id().".".$ext;
		move_uploaded_file($sp, $dp);
		print '<span class="success">Data Saved</span>';
		$name = "";
		$contact = "";
		$email = "";
		$dateofbirth = "";
		$gender = "";
		$address = "";
		$city = "0";
		$cv["name"] = "";
	}
	else
	{
		print '<span class="error">'.mysql_error().'</span>';
	}	
	
}
?>
<form method="post" enctype="multipart/form-data" action="">
Name<br><input type="text" name="name" value="<?php print $name; ?>" required /><br /><br />
Contact<br><input type="text" name="contact" value="<?php print $contact; ?>" required /><br /><br />
Email<br><input type="text" name="email" value="<?php print $email; ?>" required /><br /><br />
Date Of Birth<br><input type="text" name="dateofbirth" value="<?php print $dateofbirth; ?>" required /><br /><br />
Gender<br>
<input type="radio" name="gender" value="0" />Male  
<input type="radio" name="gender" value="1" />Female<br />
<br />
Address<br>
<textarea name="address"><?php print $address;?></textarea><br><br>
City<br>
<select name="city">
<option value="0">Select</option>
<?php
$sql = "select id, name from city";
$r = mysql_query($sql);
while($s = mysql_fetch_row($r))
{
	if($s[0] == $city)
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
Select CV<br><input type="file" name="cv" required /><br>
<br>
<input type="submit" name="submit" value="Submit"/>
</form>
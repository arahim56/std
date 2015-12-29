<?php
$student = "0";
$course = "0";
$date = "";
$enddate = "";
$result = "";

if(isset($_POST['submit']))
{
	$student = $_POST['student'];
	$course = $_POST['course'];
	$date = $_POST['date'];
	$enddate = $_POST['enddate'];
	$result = $_POST['result'];
	
	if($result == "")
	{
		$result = 'NULL';
	}
	
	$sql = "insert into coursevsstudent(studentId, courseId, date, enddate, result)
			values(".ms($student).",".ms($course).",'".ms($date)."',
			'".ms($enddate)."','".ms($result)."')";
	if(mysql_query($sql))
	{
		print '<span class="success">Data Saved</span>';
		$student = "0";
		$course = "0";
		$date = "";
		$enddate = "";
		$result = "";
	}
	else
	{
		print '<span class="error">'.mysql_error().'</span>';
	}
	
}

?>
<form method="post" action="">
Student<br>
<select name="student" required>
<option value="0">Select</option>
<?php
$sql = "select id, email from student";
$r = mysql_query($sql);
while($s = mysql_fetch_row($r))
{
	if($student == $s[0])
	{
		print '<option value="'.$s[0].'" selected>'.$s[1].'</option>';
	}
	else
	{
		print '<option value="'.$s[0].'">'.$s[1].'</option>';
	}
}
?>
</select><br /><br />
Course<br>
<select name="course" required>
<option value="0">Select</option>
<?php
$sql = "select id, name from course";
$r = mysql_query($sql);
while($s = mysql_fetch_row($r))
{
	print '<option value="'.$s[0].'">'.$s[1].'</option>';
}
?>
</select><br /><br />
Start Date<br><input type="text" name="date" required/><br><br>
End Date<br><input type="text" name="enddate" required/><br><br>
Result<br><input type="text" name="result" /><br><br>
<input type="submit" name="submit" value="Submit"/>
</form>
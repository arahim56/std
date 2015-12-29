<a class="newentry" href="?a=artclstudent_image_newb">New Entry</a><hr>
<?php
$student = "0";
if(isset($_REQUEST["student"]))
{
	$student = $_REQUEST['student'];
}
?>
<div class="search">
<form method="post" action="">
Student<select name="student" required>
<option value="0">Select</option>
<?php
$sql = "select id, email from student";
$r = mysql_query($sql);
while($s = mysql_fetch_row($r))
{
	if($s[0] == $student)
	{
		print '<option value="'.$s[0].'" selected>'.$s[1].'</option>';
	}
	else
	{
		print '<option value="'.$s[0].'">'.$s[1].'</option>';
	}
}
?>
</select><input type="submit" name="submit" value="Search"/>
</form>
</div>
<?php
if(isset($_GET['delete']))
{
	$sql = "delete from studentImage where id = ".ms($_GET['delete']);
	if(mysql_query($sql))
	{
		print '<span class="success">Data Deleted</span>';
	}
	else
	{
		print '<span class="error">'.mysql_error().'</span>';
	}
}
$sql = "select si.id, s.name, s.email, si.date, si.image, si.description
		from studentimage as si, student as s
		where si.studentId = s.Id ";
if($student != "0")
{
	$sql .= " and s.id = ".ms($student);
}
$r = mysql_query($sql);
?>
<div class="tableHead">
<form method="post" action="print.php">
<?php
	$rows = mysql_num_rows($r);
	print "Total $rows Rows Found. ";
?>
<input type="hidden" name="sql" value="<?php print $sql; ?>"/>
<input type="hidden" name="start" value="1"/>
<input type="submit" name="submit" value="Print"/>
</form>
</div>
<?php
print '<table class="data" cellpading="0" cellspacing="0">';
print '<tr><th>Name</th><th>Email</th><th>Date</th><th>Image</th><th>Description</th><th>#</th></tr>';
while($s = mysql_fetch_row($r))
{
	print '<tr>';
	print '<td>'.htmlentities($s[1]).'</td>';
	print '<td>'.htmlentities($s[2]).'</td>';
	print '<td>'.htmlentities($s[3]).'</td>';
	print '<td><img src="StudentImages/'.$s[0].'.'.$s[4].'" width="100px"></td>';
	print '<td>'.htmlentities($s[5]).'</td>';
	delete($s[0]);
	print '</tr>';
}
print '</table>';

?>
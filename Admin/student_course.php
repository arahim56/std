<?php
$student = "0";
if(isset($_REQUEST['student']))
{
	$student = $_REQUEST['student'];
}
?>
<a class="newentry" href="?a=artclstudent_course_newk">New Entry</a><hr>
<div class="search">
<form method="post" action="">
<fieldset>
<legend>Search</legend>
Student
<select name="student">
<option value="0">Select</option>
<?php
if(isset($_GET['student']) and isset($_GET['course']))
{
	$sql = "delete from coursevsstudent where studentid = ".ms($_GET['student']). " and courseId = ".ms($_GET['course']);
	if(mysql_query($sql))
	{
		print '<span class="success">Data Deleted</span>';
	}
	else
	{
		print '<span class="error">'.mysql_error().'</span>';
	}
}
$sql = "select id, concat(email,' [',name,']') as expr1 from student 
		where id in(select studentId from coursevsstudent)";
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
</select><input type="submit" name="submit" value="Search"/>
</fieldset>
</form>
</div>
<?php
$sql = "select cs.studentId, cs.courseId, s.name, c.name, cs.date, 
		cs.enddate, cs.result
		from coursevsstudent cs, student s, course c where cs.studentId = s.id
		and cs.courseId = c.Id";
if($student > 0)
{
	$sql .= " and s.Id = ".ms($student);
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
print '<tr><th>Student</th><th>Course</th><th>Date</th><th>End Date</th><th>Result</th></tr>';
while($s = mysql_fetch_row($r))
{
	print '<tr>';
	print '<td>'.htmlentities($s[2]).'</td>';
	print '<td>'.htmlentities($s[3]).'</td>';
	print '<td>'.htmlentities($s[4]).'</td>';
	print '<td>'.htmlentities($s[5]).'</td>';
	print '<td>'.htmlentities($s[6]).'</td>';
	
	$a["student"] = $s[0];
	$a["course"] = $s[1];
	delete(0, $a);
	print '</tr>';
}
print '</table>';
?>

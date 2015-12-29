<a class="newentry" href="?a=artclstudent_neww">New Entry<a><hr>
<?php
if(isset($_GET['delete']))
{
	$sql = "select cv from student where id = ".ms($_GET['delete']);
	$r = mysql_query($sql);
	while($s = mysql_fetch_row($r))
	{
		$sql2 = "delete from student where id = ".ms($_GET['delete']);
		if(mysql_query($sql2))
		{
			unlink("CVS/".ms($_GET['delete']).".".$s[0]);
			print '<span class="success">Data Deleted</span>';
		}
		else
		{
			print '<span class="error">'.mysql_error().'</span>';
		}	
	}
}
$sql = "select s.id, s.name, s.contact, s.email, s.dateofbirth, 
		case s.gender when 0 then 'Male' else 'Female' end as Gender,
		s.address, ct.name as City, cn.name as Country, s.cv
	from student as s, city as ct, country as cn where 
	s.cityId = ct.Id and ct.countryId = cn.Id";
$r = mysql_query($sql);
?>
<input type="button" onclick="jsprint('Student')" name="Report" value="Print Report"/>
<?php
print '<div id="pdata">';
print '<table  class="data" cellpading="0" cellspacing="0">';
print '<tr><th>Name</th><th>Contact</th><th>Email</th><th>Date of Birth</th>
		<th>Gender</th><th>Address</th><th>City</th><th>Country</th><th>CV</th><th>Image</th><th>Courses</th><th>#</th></tr>';
while($s = mysql_fetch_row($r))
{
	print '<tr>';
	print '<td>'.htmlentities($s[1]).'</td>';
	print '<td>'.htmlentities($s[2]).'</td>';
	print '<td>'.htmlentities($s[3]).'</td>';
	print '<td>'.htmlentities($s[4]).'</td>';
	print '<td>'.htmlentities($s[5]).'</td>';
	print '<td>'.htmlentities($s[6]).'</td>';
	print '<td>'.htmlentities($s[7]).'</td>';
	print '<td>'.htmlentities($s[8]).'</td>';
	print '<td><a href="CVS/'.$s[0].'.'.$s[9].'">Download</a></td>';
	print '<td>';
	$sql2 = "select * from studentimage where studentid = ".$s[0]." limit 0, 1";
	$r2 = mysql_query($sql2);
	if(mysql_num_rows($r2) >= 1)
	{
		while($s2 = mysql_fetch_row($r2))
		{
			print '<a href="?a=artclstudent_imaget&student='.$s[0].'"><img src="StudentImages/'.$s2[0].'.'.$s2[2].'" width="100px"/></a>';
		}
	}
	else
	{
		print '<img src="Images/noimage.jpg" width="100px"/>';
	}
	print '</td>';
	print '<td>';
	
	$sql3 = "select c.name from coursevsstudent cs, course c 
	where cs.courseId = c.Id and cs.studentid = ".$s[0];
	$r3 = mysql_query($sql3);
	while($s3 = mysql_fetch_row($r3))
	{
		print $s3[0].", ";
	}
	print '<a href="?a=artclstudent_courser&student='.$s[0].'">Total : '.mysql_num_rows($r3).'</a>';
	print '</td>';
	print '<td><a href="?a=artclstudent_edit7&id='.$s[0].'">Edit</a></td>';
	delete($s[0]);
	print '</tr>';
}
print '</table>';
print '</div>';
?>

<script language="JavaScript" type="text/javascript">
function jsprint(s)
{
	var doc = document.getElementById("allpage").innerHTML;
	document.styleSheets[0].disabled = true;
	var content = '<link href="CSS/report.css" rel="stylesheet" type="text/css" /><div class="data"><div class="header"><h1>Runner Cyberlink Limited</h1><h2>Nagar Nirupoma, 13/5, 3<sup>rd</sup> Floor, Aurongzeb Road, Mohammadpur, Dhaka-1207</h2><h3>info@runnercyberlinkltd.com,rcl@birds-group.com, +8801912012982, +8801841111102</h3></div><div align="center">';
	content = content + s;
	content = content + '</div>';
	
	content = content + document.getElementById("pdata").innerHTML;
					
	content = content + '</div>';
	
	document.getElementById("allpage").innerHTML = content;
	window.print();
	document.styleSheets[0].disabled = false;
	document.getElementById("allpage").innerHTML = doc;
}
</script>

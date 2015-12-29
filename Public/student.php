<?php
$sql = "select s.id, s.name, s.contact, s.email, s.dateofbirth, 
		case s.gender when 0 then 'Male' else 'Female' end as Gender,
		s.address, ct.name as City, cn.name as Country, s.cv
	from student as s, city as ct, country as cn where 
	s.cityId = ct.Id and ct.countryId = cn.Id";
$r = mysql_query($sql);
$rows = mysql_num_rows($r);
print '<div class="rowcount">'."Total $rows ".ucwords(str_replace("_", " ",$page))." Found".'</div>';

print '<div class="students">';
while($s = mysql_fetch_array($r))
{
	print '<div class="student">';
		singleImage($s[0]);
		print '<div class="description">';
		if(isset($_SESSION['type']))
		{
			if($_SESSION['type'] == "A" or $_SESSION['type'] == "U")
			{
				print '<span><a href="?a=artclstudent_edity&id='.$s[0].'">Edit This Profile</a></span>';
			}
			else if($_SESSION['id'] == $s[0])
			{
				print '<span><a href="?a=artclstudent_edity&id='.$s[0].'">Edit This Profile</a></span>';
			}
		}
		print '<span><b>'.$s["name"].', <i>'.$s["contact"].', '.$s["email"].'</i></b></span>';
		print '<span>Gender : '.$s["Gender"].', From : '.$s["City"].', '.$s["Country"].'</span>';
		print '<span>Images : '.Images($s[0]).', Courses : '.Courses($s[0]).'</span>';
		print '<span><a href="CVS/'.$s[0].'.'.$s[9].'">Download CV</a></span>';
		print '<span><a href="?p=artclProfileK&id='.$s[0].'">View Profile</a></span>';
		print '</div>';
	print '</div>';
}
print '</div>';


function singleImage($id)
{
	$sql2 = "select * from studentimage where studentid = ".$id." limit 0, 1";
	$r2 = mysql_query($sql2);
	if(mysql_num_rows($r2) >= 1)
	{
		while($s2 = mysql_fetch_row($r2))
		{
			print '<a href="?p=artclProfileK&id='.$id.'"><img src="StudentImages/'.$s2[0].'.'.$s2[2].'"/></a>';
		}
	}
	else
	{
		print '<img src="Images/noimage.jpg"/>';
	}
}
function Images($id)
{
	$sql2 = "select count(*) from studentimage where studentid = ".$id;
	$r2 = mysql_query($sql2);
	while($s2 = mysql_fetch_row($r2))
	{
		if($s2[0] > 0)
		return '<a href="?p=artclgalleryT&student='.$id.'">'.$s2[0].'</a>';
	}
	return '<a href="#">0</a>';
}

function Courses($id)
{
	$sql2 = "select count(*) from coursevsstudent where studentid = ".$id;
	$r2 = mysql_query($sql2);
	while($s2 = mysql_fetch_row($r2))
	{
		if($s2[0] > 0)
		return '<a href="?p=artclcourseT&student='.$id.'">'.$s2[0].'</a>';
	}
	return '<a href="#">0</a>';
}

?>


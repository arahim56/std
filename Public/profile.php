<?php
$sql = "select s.id, s.name, s.contact, s.email, s.dateofbirth, 
		case s.gender when 0 then 'Male' else 'Female' end as Gender,
		s.address, ct.name as City, cn.name as Country, s.cv
	from student as s, city as ct, country as cn where 
	s.cityId = ct.Id and ct.countryId = cn.Id and s.id = ".ms($_REQUEST['id']);
$r = mysql_query($sql);

while($s = mysql_fetch_array($r))
{
	print '<div class="imagedetails">';
	if(isset($_REQUEST['img']))
	{
		print '<img src="StudentImages/'.base64_decode(ms($_REQUEST['img'])).'"/>';
	}
	else
	{
		singleImage($s[0]);
	}
	print '<div class="allimagecontainer"><div class="allimages">';
	images($s[0]);
	print '</div></div>';
	print '</div>';	
	print '<div class="details">';
	print '<div class="singledetails">';
	print	'<span>Name: <span><b>'.$s['name'].'</b></span></span><br>';
	print	'<span>Contact: <span>'.$s['contact'].'</span></span><br>';
	print	'<span>E-mail: <span>'.$s['email'].'</span></span><br>';
	print	'<span>Date of Birth: <span>'.$s['dateofbirth'].'</span></span><br>';
	print	'<span>Gender: <span>'.$s['Gender'].'</span></span><br>';
	print	'<span>Address: <span>'.$s['address'].'</span></span><br>';
	print	'<span>City: <span>'.$s['City'].'</span></span><br>';
	print	'<span>Country: <span>'.$s['Country'].'</span></span><br>';
	
	print '<span>Course: </span>';
	$sql3 = "select c.name from coursevsstudent cs, course c 
	where cs.courseId = c.Id and cs.studentid = ".$s[0];
	$r3 = mysql_query($sql3);
	while($s3 = mysql_fetch_row($r3))
	{
		print $s3[0].", ";
	}
	print 	'<span><a href="CVS/'.$s[0].'.'.$s[9].'"><br>Download CV</a></span>';
	
	print '</div>';
	print '</div>';
}


function singleImage($id)
{
	$sql2 = "select * from studentimage where studentid = ".$id." limit 0, 1";
	$r2 = mysql_query($sql2);
	if(mysql_num_rows($r2) >= 1)
	{
		while($s2 = mysql_fetch_row($r2))
		{
			print '<img src="StudentImages/'.$s2[0].'.'.$s2[2].'"/>';
		}
	}
	else
	{
		print '<img src="Images/noimage.jpg"/>';
	}
}
function Images($id)
{
	$sql2 = "select * from studentimage where studentid = ".$id;
	$r2 = mysql_query($sql2);
	while($s2 = mysql_fetch_row($r2))
	{
		$img = $s2[0].'.'.$s2[2];
		print '<a href="?p=artclProfileK&id='.$id.'&img='.base64_encode($img).'"><img src="StudentImages/'.$s2[0].'.'.$s2[2].'"/></a>';
	}
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


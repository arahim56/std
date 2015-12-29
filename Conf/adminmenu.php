<?php
if(isset($_SESSION['type']))
{
	if($_SESSION['type'] == "U" or $_SESSION['type'] == "A")
	{
		print '<a href="./?a=artclcountryb">Country</a>
				<a href="./?a=artcldepartmentb">Department</a>
				<a href="./?a=artclcityb">City</a>
				<a href="./?a=artclcourseb">Course</a>
				<a href="./?a=artclstudentb">Student</a>
				<a href="./?a=artclstudent_courseb">Student Course</a>
				<a href="./?a=artclstudent_imageb">Student Image</a>';
	}
	print 'Welcome : <b><a href="#">'.$_SESSION['name'].'</a></b><a href="?p=artcllogoutg">Logout</a>';
}
else
{
	print 'Welcome : <b>Guest</a></b><a href="?p=brtcllogink">Login</a> <a href=?p=register>Register</a>';
}

?>

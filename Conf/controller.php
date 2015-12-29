<?php
$page = "";



if(isset($_GET['a']))
{
	if(isset($_SESSION['type']))
	{
		if($_SESSION['type'] == "R")
		{
			print 'You have to login with Admin account to view this content<hr><br>';
			include('Public/login.php');
		}
		else
		{
			$page = $_GET['a'];
			$page = substr($page, 5, strlen($page) - 6);
			if(file_exists("Admin/".$page.".php"))
			{
				print '<span class="pagehead">'.ucwords(str_replace("_", " ",$page)).'</span>';
				include("Admin/".$page.".php");
			}
			else
			{
				include('Public/hacking_attempt.php');
			}
		}
	}
	else
	{
		print 'You have to login to view this content<hr><br>';
		include('Public/login.php');
	}
}
else if(isset($_GET['p']))
{
	$page = $_GET['p'];
	$page = substr($page, 5, strlen($page) - 6);
	if(file_exists("Public/".$page.".php"))
	{
		print '<span class="pagehead">'.ucwords(str_replace("_", " ",$page)).'</span>';
		if(isset($_POST['btnLogin']))
		{
			if(isset($_SESSION['type']))
			{
				print '<span class="success">Login Successfull</span>';
			}
			else
			{
				print '<span class="error">Invalid Login Attemp</span>';
				include("Public/".$page.".php");
			}
		}
		else
		{
			include("Public/".$page.".php");
		}
	}
	else
	{
		include('Public/hacking_attempt.php');
	}
}


?>
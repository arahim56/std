<?php

mysql_connect('localhost', 'root', '');
mysql_select_db('dbsms');


$page = "";

if(isset($_GET['p']))
{
	$page = $_GET['p'];
	$page = substr($page, 5, strlen($page) - 6);
	if($page == "logout")
	{
		unset($_SESSION["id"]);
		unset($_SESSION["name"]);
		unset($_SESSION["email"]);
		unset($_SESSION["type"]);
	}
	else if($page == "login")
	{
		if(isset($_POST["btnLogin"]))
		{
			$sql = "select * from student where email = '".ms($_POST['email'])."' and password = password('".ms($_POST["password"])."')";
		$r = mysql_query($sql);
		
		if(mysql_num_rows($r) > 0)
		{
			while($s = mysql_fetch_array($r))
			{
				$_SESSION["id"] = $s["id"];
				$_SESSION["name"] = $s["name"];
				$_SESSION["email"] = $s["email"];
				$_SESSION["type"] = $s["type"];
			}
		}
	}
}
}



function ms($v)
{
	return mysql_real_escape_string(strip_tags($v));
}

function delete($id, &$a = "")
{
	if($id > 0)
	{
		print '<td><a href="#" onclick="makeconfirm(\'&delete='.$id.'\', \''.$_GET['a'].'\')">Delete</a></td>';
	}
	else
	{
		$s = "";
		foreach($a as $k=>$v)
		{
			$s .= "&$k=$v";
		}
		print '<td><a href="#" onclick="makeconfirm(\''.$s.'\', \''.$_GET['a'].'\')">Delete</a></td>';
	}
}

?>

<script language="JavaScript" type="text/javascript">
function makeconfirm(id, page)
{
	var v = confirm("R U Sure ?");
	if(v)
	{
		window.location = '?a='+page+id;
	}
	return false;
}
function makeRedirect(page)
{
	window.location = '?a='+page;
	return false;
}
</script>

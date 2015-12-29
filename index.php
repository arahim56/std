<?php
session_start();

include("conf/cn.php");
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Student Management System</title>
<link href="CSS/design.css" rel="stylesheet" type="text/css" />



</head>
<body>
<div id="allpage">
<div class="header">
<div class="adminmenu">
<?php
include('Conf/adminmenu.php');
?>
</div>
<div class="logo">
<img src="Images/logo.jpg" />
</div>
<div class="right">
<h1>Student Buliders System</h1>
<h2>Best people works with ........... !</h2>
</div>
</div>
<div class="main">
	<div class="menu">
		<?php
		include('Conf/menu.php');
		?>
	</div>
	<div class="content">
	<?php
	include('Conf/controller.php');
	?>
	</div>
</div>
<div class="footer">
	copyright @ Abdur Rahim <?php print date('Y'); ?>
</div>
</div>
</body>
</html>

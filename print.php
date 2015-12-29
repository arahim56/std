<link href="CSS/report.css" rel="stylesheet" type="text/css" />
<div class="data">
<div class="header">
<h1>Runner Cyberlink Limited</h1>
<h2>Nagar Nirupoma, 13/5, 3<sup>rd</sup> Floor, Aurongzeb Road, Mohammadpur, Dhaka-1207</h2>
<h3>info@runnercyberlinkltd.com, rcl@birds-group.com, +8801912012982, +8801841111102</h3>
</div>
<div align="center"><?php print $_REQUEST['name']; ?></div>
<?php
include("conf/cn.php");
$r = mysql_query($_POST['sql']);
print '<table cellpadding="0" cellspacing="0">';

$r2 = mysql_query($_POST['sql']);


while($s2 = mysql_fetch_assoc($r2))
{
	print '<tr>';
	$i = 0;
	foreach($s2 as $k=>$v)
	{
		if($i >= $_POST['start'])
		{
			print '<th>'.ucwords($k).'</th>';
		}
		$i++;
	}
	print '</tr>';	
	break;
}
while($s = mysql_fetch_row($r))
{	
	print '<tr>';
	for($i = $_POST['start']; $i < count($s); $i++)
	{
		print '<td>'.$s[$i].'</td>';
	}
	print '</tr>';
}
print '</table>';
?>
</div>
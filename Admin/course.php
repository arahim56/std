<a class="newentry" href="?a=artcrcourse_newt">New Entry</a><hr />

<?php
if(isset($_GET['delete']))
{
	$sql = "delete from course where id = ".ms($_GET['delete']);
	if(mysql_query($sql))
	{
		print '<span class="success">Data Deleted</span>';
	}
	else
	{
		print '<span class="error">'.mysql_error().'</span>';
	}
}
$sql = "select  c.id, c.name, d.name as Department, c.fee, c.duration,
	c.link, c.sylebus as donotshow1, c.Description
	from course as c, department as d where c.departmentId = d.Id";
$r = mysql_query($sql);
?>
<div class="tableHead">
<form method="post" action="print.php?name=Course">
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
print '<tr><th>Name</th><th>Department</th><th>Fee</th><th>Duration</th><th>Link</th><th>Sylebus</th><th>Description</th><th>#</th></tr>';
while($s = mysql_fetch_row($r))
{
	print '<tr>';
	print '<td>'.$s[1].'</td>';
	print '<td>'.$s[2].'</td>';
	print '<td>'.$s[3].'</td>';
	print '<td>'.$s[4].'</td>';
	print '<td>'.$s[5].'</td>';
	print '<td><a href="Sylebus/'.$s[0].".".$s[6].'">Download</a></td>';
	print '<td>'.$s[7].'</td>';
	delete($s[0]);
	print '</tr>';
}
print '</table>';
?>

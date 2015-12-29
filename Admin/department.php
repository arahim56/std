<a class="newentry" href="?a=artcldepartment_newb">New Entry</a><hr />
<?php
if(isset($_GET['delete']))
{
	$sql = "delete from department where id = ".ms($_GET['delete']);
	if(mysql_query($sql))
	{
		print '<span class="success">Data Deleted</span>';
	}
	else
	{
		print '<span class="error">'.mysql_error().'</span>';
	}
}
$sql = "select id, name, description from department";
$r = mysql_query($sql);
?>
<div class="tableHead">
<form method="post" action="print.php?name=Department">
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
print '<tr><th>Name</th><th>Description</th><th>#</th><th>#</th></tr>';
while($s = mysql_fetch_row($r))
{
	print '<tr>';
	print '<td>'.$s[1].'</td>';
	print '<td>'.$s[2].'</td>';
	print '<td><a href="?a=artcldepartment_edit4&id='.$s[0].'&returnPage='.$_GET['a'].'">Edit</a></td>';
	delete($s[0]);
	print '</tr>';
}
print '</table>';
?>

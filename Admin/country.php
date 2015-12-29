<?php
if($_SESSION['type'] == "A")
{
	print '<a class="newentry" href="?a=artclcountry_newb">New Entry</a><hr />';
}

if(isset($_GET['delete']))
{
	$sql = "delete from country where id = ".ms($_GET['delete']);
	if(mysql_query($sql))
	{
		print '<span class="success">Data Deleted</span>';
	}
	else
	{
		print '<span class="error">'.mysql_error().'</span>';
	}
}
$sql = "select c.id, c.name, (select count(*) from city where countryid = c.id) as NumberOfCity from country as c";
$r = mysql_query($sql);
?>
<div class="tableHead">
<form method="post" action="print.php?name=Country">
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
print '<tr><th>Name</th><th>City</th><th>#</th><th>#</th></tr>';
while($s = mysql_fetch_row($r))
{
	print '<tr>';
	print '<td>'.htmlentities($s[1]).'</td>';
	print '<td><a href="city.php?country='.$s[0].'">'.$s[2].'</a></td>';
	if($_SESSION['type'] == "A")
	{
		delete($s[0]);
	}
	print '<td><a href="?a=artclcountry_edit4&id='.$s[0].'">Edit</a></td>';
	print '</tr>';
}
print '</table>';
?>


<?php
$country = "0";
if(isset($_REQUEST['country']))
{
	$country = $_REQUEST['country'];
}
?>
<a class="newentry" href="?a=artclcity_newb">New Entry</a><hr />
<div class="search">
<form method="post" action="">
<fieldset>
<legend>Search</legend>
Country
<select name="country">
<option value="0">Select</option>
<?php
$sql = "select * from country where id in(select countryId from city)";
$r = mysql_query($sql);
while($s = mysql_fetch_row($r))
{
	if($country == $s[0])
	{
		print '<option value="'.$s[0].'" selected>'.$s[1].'</option>';
	}
	else
	{
		print '<option value="'.$s[0].'">'.$s[1].'</option>';
	}
}
?>
</select><input type="submit" name="submit" value="Search"/>
</fieldset>
</form>
</div>
<?php
if(isset($_GET['delete']))
{
	$sql = "delete from city where id = ".ms($_GET['delete']);
	if(mysql_query($sql))
	{
		print '<span class="success">Data Deleted</span>';
	}
	else
	{
		print '<span class="error">'.mysql_error().'</span>';
	}
}
$sql = "select city.id, city.name, country.name as Country from city, country where city.countryId = country.Id";
if($country > 0)
{
	$sql .= " and country.Id = ".mysql_real_escape_string(strip_tags($country));
}
$r = mysql_query($sql);
?>
<div class="tableHead">
<form method="post" action="print.php?name=City">
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
print '<tr><th>Name</th><th>Country</th><th>#</th></tr>';
while($s = mysql_fetch_row($r))
{
	print '<tr>';
	print '<td>'.htmlentities($s[1]).'</td>';
	print '<td>'.htmlentities($s[2]).'</td>';
	delete($s[0]);
	print '</tr>';
}
print '</table>';
?>

<?php
$country = "0";
if(isset($_REQUEST['country']))
{
	$country = $_REQUEST['country'];
}
?>
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
$sql = "select city.id, city.name, country.name as Country from city, country where city.countryId = country.Id";
if($country > 0)
{
	$sql .= " and country.Id = ".mysql_real_escape_string(strip_tags($country));
}
$r = mysql_query($sql);
$rows = mysql_num_rows($r);
print '<div class="rowcount">'."Total $rows ".ucwords(str_replace("_", " ",$page))." Found".'</div>';
print '<ul>';
while($s = mysql_fetch_row($r))
{
	print '<li>'.$s[1].', '.$s[2].'</li>';
}
print '</ul>';
?>

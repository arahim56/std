<?php

$sql = "select c.id, c.name, (select count(*) from city where countryid = c.id) as NumberOfCity from country as c";
$r = mysql_query($sql);
$rows = mysql_num_rows($r);
print '<div class="rowcount">'."Total $rows ".ucwords(str_replace("_", " ",$page))." Found".'</div>';
print '<ul>';
while($s = mysql_fetch_row($r))
{
	print '<li>'.$s[1].' [ <a href="?p=artclcityk&country='.$s[0].'">'.$s[2]."</a> ]".'</li>';
}
print '</ul>';
?>


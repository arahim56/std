<div class="warning">You are attempting to violate our system. Your details wiil saved to our system for executive review. your details are as bellow</div> <hr /><br />
<?php
print '<table class="data">';
foreach($_SERVER as $k=>$v)
{
	print '<tr>';
	print "<td><b>$k</b></td>";
	print "<td>$v</td>";
	print '</tr>';
}
print '</table>';
?>
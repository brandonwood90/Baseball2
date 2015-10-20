<?php
function mysql_safe($string)
{
	$safeString = mysql_real_escape_string(stripslashes($string));
	return $safeString;
}
?>
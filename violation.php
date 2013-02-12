<?php

include 'database_connect.php';
class Violation {
	public static function addViolation($content_id, $rule_id, $text_violated) {
		$query = "insert into violations values('','$rule_id', '$content_id', '$text_violated')";
		$result = mysql_query($query) or die("Could not insert violation into the database ".mysql_error());
		return true;
	}
}
?>
<?php

include 'database_connect.php';
class Violation {
	public static function addViolation($content_id, $rule_id, $text_violated) {
		$query = "insert into violations values('','$rule_id', '$content_id', '$text_violated')";
		$result = mysql_query($query) or die("Could not insert violation into the database ".mysql_error());
		return true;
	}

	public static function getViolations($source_id) {
		$query = "select * from violations where sourceId='".$source_id."'";
		$result = mysql_query($query) or die("Could not get all the violations".mysql_error());
		$allViolations = array();
		while ($row = mysql_fetch_assoc($result)) {
		    array_push($allViolations,array('id'  => $row['id'], 'rule_id' => $row['ruleId'], 'source_id' => $row['sourceId'], 'textWithViolation' => $row['textWithViolation']));
		}
		return $allViolations;
	}
}
?>
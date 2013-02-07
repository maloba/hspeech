<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'database_connect.php';
class Violation {
	public static function addViolation($content_id, $rule_id, $text_violated) {
		$query = "insert into tosend values('','$to', '$message')";
		$result = mysql_query($query) or die("Could not insert toSend Message into the database ".mysql_error());
		return true;
	}

	function editSource($sourceId, $type, $sourceReference, $content) {

	}

	function removeSource($source_id) {

	}
}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'database_connect.php';

class Rule {
	public static function testContent($content, $regex) {
		if(preg_match_all("$regex", $content)) {
			$violationsList = preg_grep("$regex", $content);
		}
	}

	public static function testAllRules($content_id) {
		$allRules = Rule::getAllRules();
		$content = Source::getContent(content_id);
		
		foreach ($allRules as $rules) {
			$regex = $regex['regex'];
			Rule::testContent($content, $regex);
		}
	}

	public static function getAllRules() {
		$query = "select * from rules";
		$result = mysql_query($query) or die("Could not get all the rules".mysql_error());
		$allRules = array();
		while ($row = mysql_fetch_assoc($result)) {
		    array_push($allRules,array('id'  => $row['id'], 'regex' => $row['ruleAsRegex'], 'description' => $row['descriptionOfRule']));
		}
		return $allRules;
	}
}
?>

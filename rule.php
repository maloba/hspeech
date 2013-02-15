<?php
include 'database_connect.php';
include 'violation.php';

class Rule {
	public static function testContent($content, $content_id, $regex, $rule_id) {
		$matches = array();
		if(preg_match_all($regex, $content, $matches)) {
			foreach ($matches as $violation) {
				foreach ($violation as $v) {
					Violation::addViolation($content_id, $rule_id, $v);	
				}
			}
		}
	}

	public static function testAllRules($content_id) {
		$allRules = Rule::getAllRules();
		$content = Source::getContent($content_id);

		foreach ($allRules as $rule) {
			$regex = $rule['regex'];
			Rule::testContent($content->content, $content_id, $regex, $rule['id']);
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

	public static function getRule($rule_id) {
		$query = "select * from rules where id='$rule_id'";
		$result = mysql_query($query) or die("Could #getRule(id)# source from database ".mysql_error());
		return mysql_fetch_object($result);
	}
}
?>

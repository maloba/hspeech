<?php
include 'rule.php';
include 'source.php';

function test($type) {
	$sourceList = Source::getAllSourcesByType($type);
	foreach ($sourceList as $source) {
		//Testing the content against all the regex rules in the database
		Rule::testAllRules($source['id']);
	}
	echo "Sms tested for violations";
}

if($_REQUEST['type'] == "sms") {
	//query for sms or analyse the sms messages that are already stored in the database
	test("sms");
}
if($_REQUEST['type'] == "twitter") {
	//query for
	test("twitter");
}
if($_REQUEST['type'] == "blog") {
	test("blog");
}
?>
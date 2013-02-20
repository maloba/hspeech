<?php
include 'rule.php';
include 'source.php';

echo extension_loaded('openssl');

function test($type) {
	$sourceList = Source::getAllSourcesByType($type);
	foreach ($sourceList as $source) {
		//Testing the content against all the regex rules in the database
		Rule::testAllRules($source['id']);
		Source::setAsAnaylsed($source['id']);
	}
	echo "Sms tested for violations";
}

if($_REQUEST['type'] == "sms") {
	//sms will be recieved via smssync..there is no need to poll for messages
	test("sms");
}

if($_REQUEST['type'] == "twitter") {
	//pull all the latest tweets
	$twitterHandles = Source::getAllTwitterHandles();
	foreach ($twitterHandles as $twitterUsers) {
		Source::getTweets($twitterUsers['sourceReference']);
	}
	//test the tweets for violations
	test("twitter");
}

if($_REQUEST['type'] == "blog") {
	test("blog");
}
?>